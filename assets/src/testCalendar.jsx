'use strict'

import React, { PropTypes } from 'react'

import {render}  from 'react-dom'

import BigCalendar from 'react-big-calendar'

//import events './events.js'

//import moment from 'moment'

import localizer from 'react-big-calendar/lib/localizers/globalize';
import globalize from 'globalize';

localizer(globalize);

import 'react-big-calendar/lib/css/react-big-calendar.css'


var $ = require('jQuery');
window.$ = $;
window.jQuery = jQuery=global.jQuery=global.$ = $;

let events=
 [
  {
    'title': 'All Day Event',
    'allDay': true,
    'start': new Date(2015, 3, 0),
    'end': new Date(2015, 3, 0)
  },
  {
    'title': 'Long Event',
    'start': new Date(2015, 3, 7),
    'end': new Date(2015, 3, 10)
  },

  {
    'title': 'DTS STARTS',
    'start': new Date(2016, 2, 13, 0, 0, 0),
    'end': new Date(2016, 2, 20, 0, 0, 0)
  },

  {
    'title': 'DTS ENDS',
    'start': new Date(2016, 10, 6, 0, 0, 0),
    'end': new Date(2016, 10, 13, 0, 0, 0)
  },

  {
    'title': 'Some Event',
    'start': new Date(2015, 3, 9, 0, 0, 0),
    'end': new Date(2015, 3, 9, 0, 0, 0)
  },
  {
    'title': 'Conference',
    'start': new Date(2015, 3, 11),
    'end': new Date(2015, 3, 13),
    desc: 'Big conference for important people'
  },
  {
    'title': 'Meeting',
    'start': new Date(2015, 3, 12, 10, 30, 0, 0),
    'end': new Date(2015, 3, 12, 12, 30, 0, 0),
    desc: 'Pre-meeting meeting, to prepare for the meeting'
  },
  {
    'title': 'Lunch',
    'start':new Date(2015, 3, 12, 12, 0, 0, 0),
    'end': new Date(2015, 3, 12, 13, 0, 0, 0),
    desc: 'Power lunch'
  },
  {
    'title': 'Meeting',
    'start':new Date(2015, 3, 12,14, 0, 0, 0),
    'end': new Date(2015, 3, 12,15, 0, 0, 0)
  },
  {
    'title': 'Happy Hour',
    'start':new Date(2015, 3, 12, 17, 0, 0, 0),
    'end': new Date(2015, 3, 12, 17, 30, 0, 0),
    desc: 'Most important meal of the day'
  },
  {
    'title': 'Dinner',
    'start':new Date(2015, 3, 12, 20, 0, 0, 0),
    'end': new Date(2015, 3, 12, 21, 0, 0, 0)
  },
  {
    'title': 'Birthday Party',
    'start':new Date(2015, 3, 13, 7, 0, 0),
    'end': new Date(2015, 3, 13, 10, 30, 0)
  }
];

//console.log(events);

var Basic = React.createClass({
  render(){
    return (
      <BigCalendar
        events={events}
        defaultDate={new Date(2015, 3, 1)}
      >
      </BigCalendar>
    )
  }
})


class TestForm extends React.Component {

	constructor(){
	    super();
	    this.state = {
	      BoxID:' '
	    }
  	}

    render(){
		// <input className="form-control"></input>
		//<button type="button" onClick={this.doClick.bind(this)}> check</button>
		return (
			<div className="container">
			 <h2>Big Calendar</h2>
			 <form className="form-horizontal">
			  	<label className="col-sm-2 control-label">Select Box</label>
			  	// <Basic>
			  	// </Basic>	
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