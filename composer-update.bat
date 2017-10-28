IF EXIST %cd%\web\vendor docker run -i --rm -v "%cd%\web:/app" 3dsinteractive/composer:7.1 update
IF NOT EXIST %cd%\web\vendor docker run -i --rm -v "%cd%\web:/app" 3dsinteractive/composer:7.1 install
cls