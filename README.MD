# Bluegreen Starter for ConcreteCMS

Starter template for new ConcreteCMS projects. SASS to compile stylesheets, browser-sync to test style changes on the fly in living styleguide, Uglify and PostCSS to optimise style sheet and scripts for final theme files

## Getting Started

/build/ directory for scss and js development
/build/styleguide/ served using browser-sync to aid development
build process optimises css/js and copies to theme directory

### Prerequisites

Requires node tools to build, test and push 
- [Node](https://nodejs.org/en/download)

Built on macOS using Visual Studio Code and intended for ConcreteCMS install on LAMP stack so tweaks may be required for different tools/platforms

## Installation

Clone the project and customise files for project requirements

Open project root directory in Terminal and install the project...

    npm install

```bash
npm install
```

### Running

Start watching sass files and open the living style guide using browser-sync

    npm start

Styles created in /build/scss/
Sass output to /build/css/styles.css (with map)
Javascript added to /build/js/styles.js
Update /build/index.htm to see changes to stylesheet

styles.css and scripts.js copied over to theme directory ready for build process

## Usage

Start the project running to watch for changes to theme files and open browser-sync session for testing changes

```bash
npm run start
```

## Deployment

Build style sheets and optimise files for final theme deployment

```bash
npm run build
```

build process runs postcss and css nano on styles.css and uglifyjs on scripts.js to minify


## Built With

  - [Creative Commons](https://creativecommons.org/) - Used to choose
    the license

## Contributing

Personal project but pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Authors

  - **phowie74** - [Bluegreen Design](https://bluegreendesign.co.uk)

## License

![image info](https://i.creativecommons.org/l/by-sa/4.0/80x15.png)
This work is licensed under a [Creative Commons Attribution-ShareAlike 4.0 International License](http://creativecommons.org/licenses/by-sa/4.0/)


## Acknowledgments

  - Stephanie Eckles  - [thinkdobecreate.com](https://thinkdobecreate.com/articles/minimum-static-site-sass-setup/)
  - Kevin Powell - [kevinpowell.co](https://www.kevinpowell.co)