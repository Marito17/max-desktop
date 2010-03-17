#!/bin/sh

ORIG_PATH=/home/mario/MaX/build/ubiquity/ubiquity-2.1.35/

#for f in $(find usr/ -type f -name "*py"); do
for f in $(find usr/ -type f | grep -v ".svn"); do

  e=$(basename $f)
  if [ "$e" = "do_option" ]; then
    orig=$ORIG_PATH/d-i/source/partman-auto/automatically_partition/resize_use_free/do_option
  else
    orig=$(find $ORIG_PATH -type f -name "$e"| head -1)
  fi

  if [ "$orig" = "" ]; then
    echo "WARNING: orig not found $f" >&2
    continue
  fi
  echo diff -ur $orig $f >&2
  diff -ur $orig $f


done