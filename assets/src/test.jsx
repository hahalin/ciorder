
'use strict'

import React from 'react'

import  render  from 'react-dom'

import ModalDemo  from './Modal/ModalDemo'

//import jQuery from 'jquery'


//window.jQuery = window.$ =  require('../node_modules/jquery/dist/jquery.min');

//require('!!../node_modules/jquery/dist/jquery.min');

//import { jQuery } from 'jquery'


//import 'bootstrap/dist/css/bootstrap.css'
// http://stackoverflow.com/questions/28393674/jquery-not-define-in-bootstrap-module

global.jQuery=global.$ = require('jquery');
require('bootstrap');


//var $ = require('jquery');
//import $ from 'jquery'


//window.$ = $;
//window.jQuery = jQuery;


var Store = {
   getState()
   {
   	 return {clickCount:0}
   }
};


class Hello extends React.Component {
  	
  	//static defaultProps = { clickCount: 0 };

  	

	constructor() {
  		super();
		// this.state = {
		// 	clickCount:0
		// };
		this.state = { clickCount: 0 };
	}

  	render() {
  		//
  		//console.log(this.state.clickCount);
    	return <span>Hello {this.state.clickCount}
    	<a href="#" className="btn btn-default"  onClick={this.handleClick.bind(this)}>add click</a>
    	</span>;
    	
  	}

  	handleClick(e){
  		var v=$('#container span').text();
  		alert(v);
		 console.log(this.state.clickCount);  		  
          this.setState({ clickCount: this.state.clickCount + 1 });

  	}
}

class Tabs extends React.Component {

    componentDidMount() {
      
      $('#myTabs a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        console.log(e.target); // newly activated tab
        console.log(e.relatedTarget); // previous active tab
      });


      $('#myTabs a:eq(0)').tab('show');



    }

    render()
    {

       return <div id="myTabs">
            <ul className="nav nav-tabs" role="tablist">
                <li role="presentation" className="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
            </ul>
            <div className="tab-content">
              <div role="tabpanel" className="tab-pane active" id="home">...</div>
              <div role="tabpanel" className="tab-pane" id="profile">...</div>
              <div role="tabpanel" className="tab-pane" id="messages">...</div>
              <div role="tabpanel" className="tab-pane" id="settings">...</div>
            </div>
        </div>
       ;
          
            
          
       
       
             
       // return
       //   <div>
       //      <ul className="nav nav-tabs" role="tablist">
       //      <li role="presentation" className="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
       //      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
       //      <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
       //      <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
       //    </ul>

      
       // ;
    }
}

class TestPage extends React.Component {
  //<Tabs></Tabs>
  render(){
    return 
      <div className="row">
       <Hello></Hello>
       
      </div>
    ;
  }
}


render(
  <TestPage></TestPage>,
  document.getElementById('container')
)