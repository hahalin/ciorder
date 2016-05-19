'use strict'

import React from 'react'

import {render}  from 'react-dom'

// import QBoxWin  from './Modal/QBoxWin'

import Modal from 'react-bootstrap/lib/Modal'
import ModalHeader   from 'react-bootstrap/lib/ModalHeader'

import Popover  from 'react-bootstrap/lib/Popover'
import Tooltip   from 'react-bootstrap/lib/Tooltip'
import Button   from 'react-bootstrap/lib/Button'
import OverlayTrigger   from 'react-bootstrap/lib/OverlayTrigger'

// require("react-bootstrap/lib/ModalHeader")

var $ = require('jQuery');
window.$ = $;
window.jQuery = jQuery=global.jQuery=global.$ = $;


class ModalForm extends React.Component {

	constructor(){
	    super();
	    this.state = {
	      BoxID:' ',
	      showModal:false
	    }
  	}

  	componentDidMount()
	{
		console.log(this.props.url);
		$.get(this.props.url, function (result) {
		    this.setState({
		      'datalist':result
		    });

		}.bind(this));
	}

	close() {
		this.setState({ showModal: false });
		//this.state.showModal=false;
	}

	open() {
		//this.setState({ showModal: true });
		//console.log(this.props.url);
		$.get(this.props.url, function (result) {
		    this.setState({
		      'datalist':result,
		      showModal:true
		    });

		}.bind(this));
		//this.state.showModal=true;
	}

	setValue(v){
	    this.setState({
	      QBoxID:v
	    })
    }

	render() {
		const datalist=this.state.datalist?this.state.datalist:[];
    	let popover = <Popover title="popover">very popover. such engagement</Popover>;
    	let tooltip = <Tooltip>wow.</Tooltip>;
    	console.log(this.state);
    	
	    return (
	      <div>
	        <p>Click to get the full Modal experience!</p>

	        <Button
	          bsStyle="primary"
	          bsSize="large"
	          onClick={this.open.bind(this)}
	        >
	          Launch demo modal
	        </Button>

	        <Modal backdrop='static' show={this.state.showModal} onHide={this.close.bind(this)}>
	          <Modal.Header closeButton>
	            <Modal.Title>Modal heading</Modal.Title>
	          </Modal.Header>
	          <Modal.Body>
	            <h4>Text in a modal</h4>
	            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>

	            <h4>Popover in a modal</h4>
	            <p>there is a <OverlayTrigger overlay={popover}><a href="#">popover</a></OverlayTrigger> here</p>

	            <h4>Tooltips in a modal</h4>
	            <p>there is a <OverlayTrigger overlay={tooltip}><a href="#">tooltip</a></OverlayTrigger> here</p>

	            <hr />

	            <table className="table table-striped table-bordered" >
		            <tbody>
		            {

		              datalist.map(function(item){
		                //console.log(this.state.QBoxID);
		                var selclass=item.code==this.state.QBoxID?"success":"";
		                //console.log(selclass);
		                //var selclass="";
		                return (
		                  <tr className={selclass} key={item.code}>
		                    <td  onClick={this.setValue.bind(this,item.code)} style={{cursor:"pointer"}}>
		                      {item.nm}
		                    </td>
		                  </tr>
		                )
		              }.bind(this)) 
		            }
		            </tbody>
	            </table>
	            
	          </Modal.Body>
	          <Modal.Footer>
	            <Button onClick={this.close.bind(this)}>Close</Button>
	          </Modal.Footer>
	        </Modal>
	      </div>
	    );
  	}
}


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
  <ModalForm url="jsondata/test.json"/>
  ,
  document.getElementById('container')
)