sudo chmod 777 -R generated/ app/etc/ var/ pub/static pub/media/
sudo rm -rf var/* pub/static/* generated/*
sudo chmod 777 -R generated/ app/etc/ var/ pub/static pub/media/
sudo php bin/magento setup:upgrade
sudo php bin/magento setup:di:compile
sudo php bin/magento setup:static-content:deploy -f
sudo php bin/magento cache:clean
sudo chmod 777 -R generated/ app/etc/ var/ pub/static pub/media/
