if (global.Promise == null) {
    global.Promise = require('es6-promise')
}


var path = require('path');

var bootstrapPath = path.join(
    __dirname,
    'node_modules/bootstrap/dist/css'
);


// react forms example : 
//   https://github.com/uberllama/react_forms_example/tree/master/app/assets/javascripts/stores


//import bootstrap css
// not work http://stackoverflow.com/questions/32686297/webpack-import-bootstrap-js-and-css
//  http://stackoverflow.com/questions/36083216/using-bootstrap-classes-with-reactjs-and-webpack?rq=1
// https://www.npmjs.com/package/bootstrap-webpack


module.exports = {
    //context: path.join(__dirname, 'react_mod_src'),
    entry: {
      testModal:'./src/testModal.jsx'
      //datepicker:'./src/datepicker.jsx',
      //orderform:'./src/orderform.jsx',
      //testcalendar:'./src/testCalendar.jsx'
    },
    output: {
        path: path.join(__dirname, 'dist'),
        filename: '[name].bundle.js'
        //publicPath: 'static/'
    },
    module: {
    loaders: [
      {test: /\.css$/ , loader: 'style-loader!css-loader!postcss-loader'}, 
      {
        test: /\.sass/,
        loader: 'style-loader!css-loader!postcss-loader!sass-loader?outputStyle=expanded&indentedSyntax'
      },
      {
        test: /\.scss/,
        loader: 'style-loader!css-loader!postcss-loader!sass-loader?outputStyle=expanded'
      },
      {
        test: /\.less/,
        loader: 'style-loader!css-loader!postcss-loader!less-loader'
      },
      {
        test: /\.styl/,
        loader: 'style-loader!css-loader!postcss-loader!stylus-loader'
      },
      { test: /\.(woff|woff2)(\?v=\d+\.\d+\.\d+)?$/, loader: 'file' },
      { test: /\.ttf(\?v=\d+\.\d+\.\d+)?$/, loader: 'file' },
      { test: /\.eot(\?v=\d+\.\d+\.\d+)?$/, loader: 'file'},
      { test: /\.svg(\?v=\d+\.\d+\.\d+)?$/, loader: 'file' }
      // ,{test: /\.styl$/, loader: 'style-loader!css-loader!stylus-loader' }
      ,{
        // Test for js or jsx files.
        test: /\.js$/,
        exclude: /node_modules/,
        loader: 'babel'
      },
      {
        // Test for js or jsx files.
        test: /\.jsx/,
        exclude: /node_modules/,
        loader: 'babel'
      }
    ]},

  externals: {
      // Don't bundle the 'react' npm package with the component.
      //'react': 'React'
  },
  resolve: {
      // Include empty string '' to resolve files by their explicit extension
      // (e.g. require('./somefile.ext')).
      // Include '.js', '.jsx' to resolve files by these implicit extensions
      // (e.g. require('underscore')).
      extensions: ['', '.js', '.jsx','.css','.styl'],
      alias:{
	       "jquery-ui": "jquery-ui/jquery-ui.js",	
         "jquery": "jquery/dist/jquery.js",
	       modules: path.join(__dirname, "node_modules")
      }
      ,modulesDirectories: ['node_modules', bootstrapPath]
  },
  resolve2: {
      extensions: ['', '.js', '.jsx'],
      root: [path.join(__dirname, "bower_components")],
      alias: {
        "jquery": "jquery",
        "jquery-ui": "jquery-ui/jquery-ui.js",
    }
  }
  /*
  ,plugins: [
    new webpack.HotModuleReplacementPlugin(),
    new webpack.NoErrorsPlugin(),
    new webpack.ResolverPlugin(
        new webpack.ResolverPlugin.DirectoryDescriptionFilePlugin("bower.json", ["main"])
    )
  ]
  */
};
