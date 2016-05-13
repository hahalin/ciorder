
'use strict'

import React from 'react'

import {render}  from 'react-dom'

import DatePicker from 'react-bootstrap-datetimepicker'
import moment from 'moment'

//import 'react-datepicker/dist/react-datepicker.css';

class TestForm extends React.Component {

	constructor(){
	    super();
	    this.state = {
	    date:moment().format('YYYY-MM-DD').toString(),
	    format: "YYYY-MM-DD",
	    inputFormat: "YYYY/MM/DD",
	    mode: "date"
    };
  	}


	render(){
		    const {date, format, mode, inputFormat} = this.state;

		return (
			<div className="container">

			 <h3>DatePicker</h3>
			 <form>
			 	 <div className="form-group">
			 	    <div className="col-xs-12 col-md-3">
					 <DatePicker  
					 		viewMode={mode}
					 		format={format}
					 		inputFormat={inputFormat}

					 		dateTime={date}
						    />
					</div>
				 </div>
			  </form>
			 	
			</div>
		)
	}

}

render(
  <TestForm></TestForm>
  ,
  document.getElementById('container')
)