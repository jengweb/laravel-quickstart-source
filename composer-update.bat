IF EXIST %cd%\web\vendor docker run -i --rm -v "%cd%\web:/app" jengweb/composer:7.1 update
IF NOT EXIST %cd%\web\vendor docker run -i --rm -v "%cd%\web:/app" jengweb/composer:7.1 install
cls
