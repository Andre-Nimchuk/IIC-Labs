
import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import * as serviceWorker from './serviceWorker';
import Container from '@material-ui/core/Container';
import TextField from '@material-ui/core/TextField';
import Button from '@material-ui/core/Button';
import IconButton from '@material-ui/core/IconButton';
import RemoveIcon from '@material-ui/icons/DeleteOutlined';
import AddIcon from '@material-ui/icons/Add';
import Icon from '@material-ui/core/Icon';
import { makeStyles } from '@material-ui/core/styles';

const domContainer = document.querySelector('#like_button_container');

const useStyles = makeStyles((theme) => ({
  root: {
    '& .MuiTextField-root': {
      margin: theme.spacing(1),
    },
  },
  button: {
    margin: theme.spacing(1),
  }
}))

function App() {
  const classes = useStyles()
  const [inputFields, setInputFields] = useState([
    { Title: '', Describe: '', Date: ''},
    { Title: '', Describe: '', Date: ''},
  ]);

  const handleSubmit = (e) => {
    console.log("InputFields", inputFields);
    e.preventDefault();
  };

  const handleChangeInput = (index, event) => {
    const values = [...inputFields];
    values[index][event.target.name] = event.target.value;
    setInputFields(values);
  }

  const handleAddFields = () => {
    setInputFields([...inputFields, { Title: '', Describe: '', Date: ''}])
  }

  const handleRemoveFields = (index) => {
    const values  = [...inputFields];
    values.splice(index, 1);
    setInputFields(values);
  }

  const ContainerStyle = {
      display: "flex",
      justifyContent: "flex-end",
      marginLeft: "250px"
  }

  const FormField = {
    display: "flex",
    justifyContent: "flex-start",
    flexDirection: "column",
    width: "500px",
    }
  const FormButton = {
    display: "flex",
    justifyContent: "flex-end",
  }
  
 
  return (
    <Container style={ContainerStyle}>
      <form className={classes.root} onSubmit={handleSubmit}>
      <h1>Add New Information</h1>
        { inputFields.map((inputField, index) => (
          <div key={index} style={FormField}>
            <TextField 
              name="Title"
              label="Title"
              variant="filled"
              value={inputField.Title}
              onChange={event => handleChangeInput(index, event)}
            />
            <TextField 
              name="Describe"
              label="Describe"
              variant="filled"
              value={inputField.Describe}
              onChange={event => handleChangeInput(index, event)}
            />
            <TextField
            id="datetime-local"
            name="Date"
            label="Date"
            type="datetime-local"
            defaultValue="2017-05-24T10:30"
            className={classes.textField}
            onChange={event => handleChangeInput(index, event)}
            InputLabelProps={{
            shrink: true,
            }}
        />
            <div style={FormButton}>
            <IconButton
              onClick={() => handleRemoveFields(index)}
            >
            
              <RemoveIcon />
            </IconButton>
            <IconButton
              onClick={() => handleAddFields()}
            >
              <AddIcon />
            </IconButton>
            </div>
          </div>
        
        )) }
        <Button
          className={classes.button}
          variant="contained" 
          color="primary" 
          type="submit" 
          endIcon={<Icon>send</Icon>}
          onClick={handleSubmit}
        >Send</Button>
      </form>
    </Container>
  );
}

ReactDOM.render(
    <App />,
  domContainer);

  serviceWorker.unregister();