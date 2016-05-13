
import React from 'react';
//import Component from 'react-pure-render/component';
import  render  from 'react-dom'
import Modal from 'react-modal-with-keys-action';
import './modal.styl';
 
export default class QBoxWin extends React.Component {
 
  constructor(props){  
    super(props);
    
    this.openModalAction = this.openModalAction.bind(this);
    this.closeModalAction = this.closeModalAction.bind(this);
    this.state = {
      isModalVisible: false,
      BoxID:props.BoxID?this.props.BoxID:"null",
      QBoxID:props.BoxID?this.props.BoxID:"null"
      
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

  componentWillUnmount()
  {
    this.serverRequest.abort();
  }
 
  openModalAction(){
    this.setState({
      isModalVisible: true
    })
  }
 
  closeModalAction(){
    this.setState({
      isModalVisible: false
    })
  }
 
  acs(){

    console.log('Key pressed: Enter + Alt + Control + Shift');
  }
  ac(){

    console.log('Key pressed: Enter + Alt + Control');
  }
  a(){
    console.log('Key pressed: Enter + Alt');
  }
  noMulti(){

    console.log('Key pressed: Enter');
  }
  
  handleChange(e)
  {
    this.setState({
      QBoxID:e.target.value
    })
  }

  SaveAndClose(){
    this.setState({
      isModalVisible: false,
      BoxID:this.state.QBoxID
    });
    this.edBoxID.value=this.state.QBoxID;
  }

  Cancel()
  {
      this.setState({
        isModalVisible: false
      });
  }

  setValue(v){
    this.setState({
      QBoxID:v
    })
  }

  render(){

    

    //console.log("render get props");console.log(this.props);
    const {isModalVisible} = this.state;
    const ENTER_KEY = 13;
    const modalKeysActions = [{
      key:ENTER_KEY,
      multiKeys:true,
      actions:[{
        keys:['Alt','Control', 'Shift'],
        action:this.acs
      },{
        keys:['Alt','Control'],
        action:this.ac
      },{
        keys:['Alt'],
        action:this.a
      },{
        keys:[],
        action:this.noMulti
      }]
    },{
      key:27,
      multiKeys:false,
      action:this.closeModalAction
    }]

    const datalist=this.state.datalist;

    //<input ref="edq" defaultValue={this.edBoxID.value} onChange={this.handleChange.bind(this)} />
    //<p>Press esc to close modal, press enter to perform enterAction</p>
    return(
      <div className="input-group col-sm-2">
          <input className="form-control" ref={(ref)=>this.edBoxID=ref}  defaultValue={this.state.BoxID}  >
          </input>
          <div className="input-group-btn">
            <button type="Button" className="btn btn-small" onClick={this.openModalAction}>...</button>
          </div>
        {(isModalVisible)&&
        <Modal closeModalAction={this.closeModalAction} modalKeysActions={modalKeysActions} handleKeyDownEvent={true}>
          <div className="modal-header"><h3>{this.props.title}</h3>
          </div>
          <div className="modal-body">
            
            <table className="table table-striped table-bordered" >
            <tbody>
            {

              datalist.map(function(item){
                console.log(this.state.QBoxID);
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

          </div>
          <div className="modal-footer">
            <button type="button" className="btn btn-primary" onClick={this.SaveAndClose.bind(this)} >OK</button>
            <button type="button" className="btn btn-default" onClick={this.Cancel.bind(this)} >Cancel</button>
          </div>
        </Modal>}
      </div>
    )
  }
}
