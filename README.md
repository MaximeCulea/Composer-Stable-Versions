# Composer Stable Versions
Make all your composer's dependencies stable.

This command is useful especially during an audit. It allows you to grab latest versions of your dependencies.
Once your audit is finished it's recommended to use another command : [Freeze versions](https://github.com/MaximeCulea/Composer-Freeze-Versions) to keep versions you have tested.

# What?
Your dependencies into composer.json will be automatically be changed from `"wpackagist-plugin/wordpress-seo":"6.2"` to `"wpackagist-plugin/wordpress-seo":"*@stable"`.
![See how it works](https://media.giphy.com/media/kFIBMBqzwh8OAjt2XJ/giphy.gif)

# How?
## 1 - Add to [Composer](http://composer.rarst.net/)

- Add repository source: `{ "type": "vcs", "url": "https://github.com/MaximeCulea/Composer-Stable-Versions" }`
- Include `"MaximeCulea/composer-stable-versions": "dev-master"` in your composer file as require
- Before use, launch `composer update`

## 2 - Run command
Then you can simply launch `composer versions-make-stable`!

## License
Composer Stable Versions is licensed under the [GPL3+](LICENSE.md).
