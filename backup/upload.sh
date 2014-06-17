#!bin/sh

#find /home/svn/ -exec php uploadFile.php {} \; 

while read line
do
	if [ -d "$line" ]; then
		echo $line
		php mkdir.php $line
	elif [ -f "$line" ]; then
		echo "FILE: $line"
		php upload.php $line
	fi	
	
done < tmpdir
