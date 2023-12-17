import { useState } from "react";
import 'bootstrap/dist/css/bootstrap.min.css'; 
import Popper from 'popper.js'; 
import 'bootstrap/dist/js/bootstrap.bundle.min';
import $ from "jquery";
import './App.css';



function App() {
  const [PeopleDistribute,setName] = useState("");
  const [result, setResult] = useState("");
  const [error, setError] = useState(false);
  
  const newArray = []
  const handleChange = (e) => {
    setName(e.target.value);
  };
  function validateForm() {

  }
  const handleSubmit = (e) => {
    e.preventDefault();
    const form = $(e.target);
    const isNumber = !isNaN(PeopleDistribute);
    console.log(isNumber)
    if (isNumber == false)
    {
      setError(true)
      return null;
    }
    setError(false)
    $.ajax({
      type : "POST",
      url :form.attr("action"),
      datatype: "json",
      data : form.serialize(),
      success(data){
        
        
        data.forEach(function(datas) {
          
          newArray.push(
            <div>
                {datas}
            </div>,
          );
        });
        
        setResult(newArray);
      },
     
    });
  };

  

  return (
    <div className="">
      <div class="container">
        <h3>Calculate Persons Card</h3>
      <form action="http://localhost:8000/process.php" method="POST" onSubmit={(event) => handleSubmit(event) }>
        <div class="row">
          <div class="col-md-5">
        
            <div class="form-group">
                <label htmlFor="PeopleDistribute">People Distribute: </label>
                <input type="text" id="PeopleDistribute" name="PeopleDistribute" class="form-control" value={PeopleDistribute}
                  onChange={(event) =>
                      handleChange(event)
                  }
                />
                {error == true && 
                  <span className='text-danger'>Invalid value, Please Insert Number Only! </span>
                }
            </div>
            <br></br>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
              
          </div>
        </div>
      </form>
      <br></br>
      <div className=''>
          <label>{result}</label>
          
      </div>
      </div>
   
      
      
    </div>
  );
}

export default App;
