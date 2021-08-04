HOST=hirschen@buwog-web2.vm.nextlayer.at
ROOT=/var/www/html/haller/www

rsync -rlzhtv --exclude=index.php ./web/* $HOST:$ROOT
ssh $HOST mkdir $ROOT/app

rsync -rlzhtv ./config $HOST:$ROOT/app
rsync -rlzhtv ./modules $HOST:$ROOT/app
rsync -rlzhtv --exclude=logs ./storage $HOST:$ROOT/app
rsync -rlzhtv ./templates $HOST:$ROOT/app
rsync -rlzhtv ./vendor $HOST:$ROOT/app
rsync -lzhtv ./composer.json $HOST:$ROOT/app
rsync -lzhtv ./composer.lock $HOST:$ROOT/app
rsync -rlzhtv ./craft $HOST:$ROOT/app

#TODO: Berechtigungen für app/storage und cpresources an apache geben (chgrp und chmod g+w)