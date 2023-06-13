# Johns Hopkins Omeka S Theme

## References/Notes
https://omeka.org/s/docs/developer/themes/theme_modifications/

To change a page's layout, find its file in the `application/view` folder and create
a new file with that file's name and location in the `view` folder in this theme
folder. Copy contents of the original and change to your heart's content!

To change styling, just write your sass files as usual, and include them on a template
file with `$this->headLink()->prependStylesheet($this->assetUrl('css/style.css'));`.

## Theme settings
A logo demo setting is setup in `config/theme.ini`. To access it in code, do something 
like this:

```
<?php if ($this->themeSetting('logo')): ?>
    <img src="<?php echo $this->themeSettingAssetUrl('logo'); ?>" alt="<?php echo $site->title(); ?>" />
<?php else: ?>
```

## Blocks

Must be defined in a module. See block module README for more info.