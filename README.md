# Magento 2 Prevent Add to Cart Not Login

This Extension is used for prevent user add to cart when user not login, included setting at configuration for enable or disable when and setting default wording notivication

## Features:

### Frontend
- prevent add to cart when user not login and redirect to custom page

### Backend
- configuration for enable and disable extension
- setting default wording
- setting redirect page

## Introduction installation:

### Install Magento 2 Prevent Add to Cart Not Login
- Download file
- Unzip the file
- Create a folder [root]/app/code/Dangs/Preventtocart
- Copy to folder

### Enable Extension

```
php bin/magento module:enable Dangs_Preventtocart
php bin/magento setup:upgrade
php bin/magento cache:clean
php bin/magento setup:static-content:deploy
```


## Screenshot
![ScreenShot](https://github.com/dsasmita/magento2-preventtocart/blob/master/screen-shot/config.png)
![ScreenShot](https://github.com/dsasmita/magento2-preventtocart/blob/master/screen-shot/redirect-to-login.png)

## Donation
If you find this extension help you,  feel free to donate
:)

[![](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](http://bit.ly/2nFWFZI)
