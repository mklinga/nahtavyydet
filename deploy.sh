#!/bin/bash

# First we build theme
grunt build

# Make sure dist/ exists and is empty
rm -rf ./dist
mkdir -p ./dist

# Copy necessary files to dist/ directory
cp *.php dist/
cp -r ./templates dist/
cp -r ./lib dist/

cp style.css dist/

mkdir -p dist/assets
cp ./assets/manifest.json dist/assets

mkdir -p dist/assets/css
cp assets/css/main.min.css dist/assets/css

mkdir -p dist/assets/js
cp assets/js/scripts.min.js dist/assets/js

mkdir -p dist/assets/fonts
cp ./assets/fonts/* ./dist/assets/fonts

# Make a package
tar cjf dist.tar.bz2 dist

# Copy to the server
scp -r dist.tar.bz2 laite@suspicious.website:/nahtavyydet

# Do the server-side dance
ansible-playbook -K deploy.yml

# Remove the package and directory
rm dist.tar.bz2
rm -r ./dist
