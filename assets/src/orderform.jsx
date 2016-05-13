
'use strict'

import React from 'react'

import  {render}  from 'react-dom'

import FormGroup from 'react-bootstrap/lib/FormGroup'

import FormControl from 'react-bootstrap/lib/FormControl'

import ControlLabel from 'react-bootstrap/lib/ControlLabel'

import QBoxWin  from './Modal/QBoxWin'

import DatePicker from 'react-bootstrap-datetimepicker'

import moment from 'moment'

var $ = require('jQuery');
window.$ = $;
window.jQuery = jQuery=global.jQuery=global.$ = $;

class OrderForm extends React.Component {
	constructor(){
	    super();
	    this.state = {
	      	BoxID:' ',
	      	date:moment().format('YYYY-MM-DD').toString(),
	    	format: "YYYY-MM-DD",
		    inputFormat: "YYYY/MM/DD",
		    mode: "date"
	    }
  	}

	render(){

	    const {date, format, mode, inputFormat} = this.state;
	    //					  	<label className="col-sm-2 control-label">Select Box</label>

		return (
 			<div className="container">
				 <h3>Order Form</h3>

				<form className="form-horizontal">
		        	<FormGroup>
		        		<ControlLabel className="col-sm-2 control-label">禮盒種類</ControlLabel>
		        		<QBoxWin ref={(ref)=>this.edQBox=ref}  
		        			title="禮盒種類"
		        			BoxID={this.state.BoxID}
					  		url="jsondata/test.json"
					  	></QBoxWin> 
		        	</FormGroup>
		        	<FormGroup>
		        		<ControlLabel className="col-sm-2 control-label">日期</ControlLabel>

		        		<div className="input-group col-xs-12 col-sm-2 ">
						 	<DatePicker  
						 		viewMode={mode}
						 		format={format}
						 		inputFormat={inputFormat}

						 		dateTime={date}
							/>
						</div>
		        	</FormGroup>
		        </form>
	        </div>
        )
	}
}

render(
  <OrderForm></OrderForm>,
  document.getElementById('container')
)