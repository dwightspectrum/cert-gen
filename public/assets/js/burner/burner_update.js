
 
  let certificateData = JSON.parse(BURNER_ID.image_data);
  
  let verifyData = JSON.parse(BURNER_ID.verified_place);
  
  let isolationData = JSON.parse(BURNER_ID.isolation)[0];

  let safety = isolationData[1];

  let isolationDatas = [
    isolationData,
    safety
];
  
  let signature = {
    'inspector' : BURNER_ID.inspector,
    'place' : BURNER_ID.place,
    'date' : BURNER_ID.date,
};

document.querySelector(`input[data-signify="inspector"]`).value = BURNER_ID.inspector == 'null' ? '' : BURNER_ID.inspector;
document.querySelector(`input[data-signify="place"]`).value = BURNER_ID.place == 'null' ? '' : BURNER_ID.place;
document.querySelector(`input[data-signify="date"]`).value = BURNER_ID.date == 'null' ? '' : BURNER_ID.date;


console.log(BURNER_ID);
  

certficatewithValue();
verifywithValue();
isolationwithValue();


const imageData = BURNER_ID ? JSON.parse(BURNER_ID.image_data) : [];
const verifyPlaceData = BURNER_ID ? JSON.parse(BURNER_ID.verified_place) : [];
const isolationsData =  BURNER_ID ? JSON.parse(BURNER_ID.isolation) : [];


imageData.forEach(( itemData, index ) => {
    itemData.data.forEach(( item, index2 ) => {
        const selectOkF = document.querySelector(`select[data-root-index="${index}"][data-data-index="${index2}"].okFselect`);
        selectOkF.value = item.ok_f
    })
})

verifyPlaceData.forEach(( item, index) => {
    const checkBox = document.querySelector(`input#verify-${index}.checkInput`);
    checkBox.checked = item.checked
});

isolationsData[0].forEach(( item, index) => {
    const isoSelectOkF = document.querySelector(`select[data-index="${index}"].isoSelect`);
    isoSelectOkF.value = item.ok_f
});

const lastSelectIsolation = document.querySelector('.isoLastSelect');
lastSelectIsolation.value = isolationsData[1].ok_f



document.querySelector(`[id-output="output"]`)
    .style.backgroundImage = `url(${BURNER_ID.signatures})`


 function certficatewithValue() {
    
   
    const dataTable = document.getElementById('certificate');
    dataTable.innerHTML = `
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingItem" placeholder="Item" value="${BURNER_ID.item}" disabled>
            <label for="floatingItem">Item</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="txt" class="form-control" id="floatingSerial" placeholder="Serial No." value="${BURNER_ID.serial_no}" disabled>
            <label for="floatingSerial">Serial No.</label>
          </div>
        </div>
      </div>
      <div class="card mb-0 mt-3" style="box-shadow: none;">
        <div class="row">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              ${certificateData.map((cert, index) => {
                return (`
                  <thead>
                    <tr>
                      <th scope="col" style="width: 700px;">${cert.name}</th>
                      <td scope="col">OK/F</td>
                    </tr>
                  </thead>
                  ${cert.data.map((item, dataIndex) => {
                    return (`
                      <tr>
                        <td >
                          ${item.name}
                        </td>
                        <td>
                          <select class="form-control form-control-md okFselect" value="${BURNER_ID.image_data}" data-root-index="${index}" data-data-index="${dataIndex}" style="cursor: pointer;" >
                            <option value="null" >Select</option>
                            <option value="OK" >OK</option>
                            <option value="Fail">Fail</option>
                          </select>
                        </td>
                      </tr>
                    `)
                  }).join('')}
                `)
              }).join('')}
            </table>
          </div>
  
        </div>
      </div>`;
  
  
  
    Array.from(document.querySelectorAll(`select.okFselect`))
      .forEach(elem => {
        elem.addEventListener('change', (e) => {
          let { rootIndex, dataIndex } = e.target.dataset;
          let { value } = e.target;
          let _certificateData = [...certificateData];
  
          _certificateData[rootIndex]['data'][dataIndex].ok_f = value;
          certificateData = _certificateData;
  
        });
    });
  
  }
  
  function verifywithValue() {
    const verify = document.getElementById('verify');
    verify.innerHTML = `
      ${verifyData.map((ver, index) => {
        return (`
          <div class="mt-2">
            <label for="verify-${index}" class="list-group-item" style="cursor: pointer;">
              <input class="form-check-input me-1 checkInput" type="checkbox" value="${BURNER_ID.verified_place}" aria-label="..." name="check" id="verify-${index}" data-data-index="${index}">
                ${ver.name}
            </label>
          </div> 
        `)
      }).join('')}
      <div class="text-center my-3">
        <button class="btn btn-primary btn-sm" id="markAll" >Check All</button> 
        <button class="btn btn-secondary btn-sm" id="unmarkAll">Uncheck All</button>
      </div>
    `;
  
    Array.from(document.querySelectorAll(`input.checkInput`))
    .forEach(elem => {
      elem.addEventListener('change', (e) => {
        let { dataIndex } = e.target.dataset;
        let { checked } = e.target;
        let _verifyData = [...verifyData];
   
        _verifyData[dataIndex].checked = checked;
        verifyData = _verifyData;
      });
    });
  }

  function isolationwithValue () {
    const isolation = document.getElementById('isolation');

    isolation.innerHTML = `
    <div class="card mb-0 mt-3" style="box-shadow: none;">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          ${isolationData.map((iso, index) => {
            return (`
              <thead>
                <tr>
                  <th scope="col" style="width: 700px;">${iso.test}</th>
                  <td scope="col">OK/F</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    ${iso.param}
                  </td>
                  <td>
                    <select class="form-control form-control-md isoSelect" value=${BURNER_ID.isolation}" data-index="${index}" style="cursor: pointer;" >
                      <option value="null" >Select</option>
                      <option value="OK" >OK</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            `)
          }).join('')}
        </table>
        <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th scope="col" style="width: 700px;">Function and Safety</th>
                  <td scope="col">OK/F</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    check if the device has no defect/fault
                  </td>
                  <td>
                    <select class="form-control form-control-md isoLastSelect" value="${BURNER_ID.isolation}" data-label="" style="cursor: pointer;" >
                      <option value="null" >Select</option>
                      <option value="OK" >OK</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                </tr>
              </tbody>
        </table>
      </div>
    </div>
  </div>`;
 
  }
 

  Array.from(document.querySelectorAll(`select.isoSelect`))
  .forEach(elem => {
      elem.addEventListener('change', (e) => {
        let { index } = e.target.dataset;
        let { value } = e.target;
        
        let _isolationData = [...isolationData];
        _isolationData[index].ok_f = value;

        isolationData = _isolationData;
      });
      
  }); 

  document.querySelector(`select.isoLastSelect`).addEventListener('change', (e) => {
      let { value } = e.target;

      let _safety = {...safety};
      _safety.ok_f = value

      let isolationFinal = [
          isolationData,
          _safety
      ];

      isolationDatas = isolationFinal;

  });


  
  Array.from(document.querySelectorAll('.signatures'))
    .forEach(elem => {
      elem.addEventListener('change', (e) => {
        let { signify } = e.target.dataset;
        let { value } = e.target;
        let _signature = {...signature};
        _signature[signify] = value;
        signature = _signature;
  
      });
    })
  
  
  document.getElementById('markAll').addEventListener('click', (e) => {
    marks();
  })
  document.getElementById('unmarkAll').addEventListener('click', (e) => {
    unmarks();
  })
  
  function marks() {  
    const elem = document.getElementsByName('check');  
    for(var i = 0; i < elem.length; i++) {  
        if(elem[i].type=='checkbox') {
          let _verifyData = [...verifyData];
          elem[i].checked = true;  
          _verifyData[i].checked = true;
          verifyData = _verifyData;
        } 
    } 
  }
  
  function unmarks() {  
    const elem = document.getElementsByName('check');  
    for(var i = 0; i < elem.length; i++) {  
        if(elem[i].type == 'checkbox') {
          let _verifyData = [...verifyData];
          elem[i].checked = false;  
          _verifyData[i].checked = false;
          verifyData = _verifyData;
        }  
    }  
  }
  

  const updateButton = document.getElementById('updateButton');

  updateButton.addEventListener('click', async (e) => {
      e.preventDefault();
  
      const form = new FormData();

      form.append('image_data', JSON.stringify(certificateData));
      form.append('verified_place', JSON.stringify(verifyData));
      form.append('isolation', JSON.stringify(isolationDatas));
      form.append('serial_no', BURNER_ID.serial_no);
      form.append('item', BURNER_ID.item);
      form.append('place', signature.place);
      form.append('date', signature.date);
      form.append('inspector', signature.inspector);
      form.append('signatures', signatureB64);

      updateButton.innerHTML = `
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> 
        <span>Updating...</span>`;

      const res = await fetch(`/Certificates/editEachBurner/${BURNER_ID.burner_id}`, {
        method: 'POST',
        body: form
      });
  
      const data = await res.json();

      updateButton.innerHTML = 'Updated!';
     
      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'Congratulations!',
          text: `${data.message}`,
      })
      setTimeout(function() {
        window.location.href = `/burner-lists`;
        }, 1000);
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Update Error',
          text: `${data.message}`,
        })
      }
    })



  
  
  
  
  
  
  
    