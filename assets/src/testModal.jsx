'use strict'

import React from 'react'

import {render}  from 'react-dom'

import QBoxWin  from './Modal/QBoxWin'

var $ = require('jQuery');
window.$ = $;
window.jQuery = jQuery=global.jQuery=global.$ = $;



class TestForm extends React.Component {

	constructor(){
	    super();
	    this.state = {
	      BoxID:' '
	    }
  	}

  
 
	doClick(){
		console.log(this.edQBox.props);
		console.log(this.edQBox.state.BoxID);
	}

	render(){
		// <input className="form-control"></input>
		//<button type="button" onClick={this.doClick.bind(this)}> check</button>
		return (
			<div className="container">
			 <h2>Show modal window and get return value</h2>
			 <form className="form-horizontal">
			  	<label className="col-sm-2 control-label">Select Box</label>
			  	<QBoxWin ref={(ref)=>this.edQBox=ref}  BoxID={this.state.BoxID}
			  		url="jsondata/test.json"
			  	></QBoxWin> 	
			  </form>
			  	
			 </div>
		)
	}

}

render(
  <TestForm/>
  ,
  document.getElementById('container')
)