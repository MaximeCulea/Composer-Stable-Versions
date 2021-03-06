# Composer Stable Versions
> Make all your composer's dependencies stable.

This command is useful especially during an audit. It allows you to grab latest versions of your dependencies.

Once your audit is finished it's recommended to use another command : [Freeze Versions](https://github.com/MaximeCulea/Composer-Freeze-Versions) to keep the versions you have tested.

# What?
Your dependencies into composer.json will be automatically be changed from `"wpackagist-plugin/wordpress-seo":"6.2"` to `"wpackagist-plugin/wordpress-seo":"*@stable"`.

![See how it works](https://user-images.githubusercontent.com/5576409/71735742-7e087900-2e4f-11ea-867b-786e1c92105e.gif)

# How?
## 1 - Add to [Composer](http://composer.rarst.net/)

- From [Packagist](https://packagist.org/packages/maximeculea/composer-stable-versions)
  - Do `composer require maximeculea/composer-stable-versions`
  
- From [Github](https://github.com/MaximeCulea/Composer-Stable-Versions)
  - Add into your composer json `{ "type": "vcs", "url": "https://github.com/MaximeCulea/Composer-Stable-Versions" }`
  - Include `"maximeculea/composer-stable-versions": "dev-master"` in your composer file as require
  - Before use, launch `composer update`

## 2 - Run command
Then you can simply launch `composer versions-make-stable`!

# License
Composer Stable Versions is licensed under the [GPL3+](LICENSE.md).
