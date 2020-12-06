<?php namespace MaximeCulea\ComposerScripts\ComposerStableVersions\Command;

use Composer\Command\BaseCommand;
use Composer\Json\JsonFile;
use JsonSchema\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StableVersionsCommand extends BaseCommand {

	protected $stable = '*@stable';

	protected function configure() {
		$this->setName( 'versions-make-stable' );
		$this->setDescription( 'Make all your composer\'s dependencies stable.' );
	}

	protected function execute( InputInterface $input, OutputInterface $output ) {
		$io       = $this->getIO();
		$composer = $this->getComposer();

		// what is the command's purpose
		if ( false === $io->askConfirmation( "Do you really want to set all dependencies versions to \"*@stable\"? [y|n]", true ) ) {
			return 0;
		}

		$composerPath = $composer->getConfig()->getConfigSource()->getName();
		$composerFile = new JsonFile( $composerPath );
		if ( ! $composerFile->exists() ) {
			$output->writeln( "<error>Composer file not found.</error>" );
			return 1;
		}

		// if we cannot write then bail
		if ( ! is_writable( $composerPath ) ) {
			$output->writeln( "<error>The composer.json file cannot be rewritten!</error>" );
			$output->writeln( "<error>Please check your file permissions.</error>" );
			return 1;
		}

		try {
			$composerJson = $composerFile->read();
			if ( isset( $composerJson['require'] ) ) {
				foreach ( $composerJson['require'] as $package => $version ) {
					if ( 'dev-master' === $composerJson['require'][ $package ] ) {
						continue;
					}

					$composerJson['require'][ $package ] = $this->stable;
				}
			}

			if ( isset( $composerJson['require-dev'] ) ) {
				foreach ( $composerJson['require-dev'] as $package => $version ) {
					if ( 'dev-master' === $composerJson['require-dev'][ $package ] ) {
						continue;
					}

					$composerJson['require-dev'][ $package ] = $this->stable;
				}
			}

			$composerFile->write( $composerJson );
			$output->writeln( "All dependencies are now at \"*@stable\" version!" );
		} catch( RuntimeException $e ) {
			$output->writeln( "<error>An error occurred</error>" );
			$output->writeln( sprintf( "<error>%s</error>", $e->getMessage() ) );
			return 1;
		}
	}
}
