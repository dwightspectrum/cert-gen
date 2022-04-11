

  
  let certificateData = JSON.parse(VENTILATOR_ID.image_data);
  
  let verifyData = JSON.parse(VENTILATOR_ID.verified_place);
  
  let parse = JSON.parse(VENTILATOR_ID.isolation);

  let isolationData = {
    'l1': parse.l1,
    'l2': parse.l2,
    'l3': parse.l3,
    'remarks': parse.remarks,
    'safety': parse.safety,
    }  
  
  let signature = {
    'inspector' : VENTILATOR_ID.inspector,
    'place' : VENTILATOR_ID.place,
    'date' : VENTILATOR_ID.date,
  };
  
document.querySelector(`input[data-signify="inspector"]`).value = VENTILATOR_ID.inspector == 'null' ? '' : VENTILATOR_ID.inspector;
document.querySelector(`input[data-signify="place"]`).value = VENTILATOR_ID.place == 'null' ? '' : VENTILATOR_ID.place;
document.querySelector(`input[data-signify="date"]`).value = VENTILATOR_ID.date == 'null' ? '' : VENTILATOR_ID.date;
document.querySelector(`input[data-label="l1"]`).value = parse.l1 != 'null' ? parse.l1 : '';
document.querySelector(`input[data-label="l2"]`).value = parse.l2 != 'null' ? parse.l2 : '';
document.querySelector(`input[data-label="l3"]`).value = parse.l3 != 'null' ? parse.l3 : '';
document.querySelector(`textarea[data-label="remarks"]`).value = parse.remarks != 'null' ? parse.remarks : '';
document.querySelector(`select[data-label="safety"]`).value = parse.safety != 'null' ? parse.safety : '';
  
certficate();
verify();

const imageData = VENTILATOR_ID ? JSON.parse(VENTILATOR_ID.image_data) : [];
const verifyPlaceData = VENTILATOR_ID ? JSON.parse(VENTILATOR_ID.verified_place) : [];
const isolationsData =  VENTILATOR_ID ? JSON.parse(VENTILATOR_ID.isolation) : [];
console.log({VENTILATOR_ID});
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


document.querySelector(`[id-output="output"]`)
    .style.backgroundImage = `url(${VENTILATOR_ID.signatures})`

  
  function certficate() {
  
    const dataTable = document.getElementById('certificate');
    dataTable.innerHTML = `
      <div class="row mt-3">
        <div class="col-md-6">
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingItem" placeholder="Item" value="${VENTILATOR_ID.item}" disabled>
            <label for="floatingItem">Item</label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-floating">
            <input type="txt" class="form-control" id="floatingSerial" placeholder="Serial No." value="${VENTILATOR_ID.serial_no}" disabled>
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
                          <select class="form-control form-control-md okFselect" value="OK" data-root-index="${index}" data-data-index="${dataIndex}" style="cursor: pointer;" >
                            <option value="" >Select</option>
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
  
  function verify() {
    const verify = document.getElementById('verify');
    verify.innerHTML = `
      ${verifyData.map((ver, index) => {
        return (`
          <div class="mt-2">
            <label for="verify-${index}" class="list-group-item" style="cursor: pointer;">
              <input class="form-check-input me-1 checkInput" type="checkbox" aria-label="..." name="check" id="verify-${index}" data-data-index="${index}">
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
  
  Array.from(document.querySelectorAll('.isolation'))
  .forEach(elem => {
    elem.addEventListener('change', (e) => {
      let { label } = e.target.dataset;
      let { value } = e.target;
  
  
      let _isolation = {...isolationData};
        _isolation[label] = value;
  
        isolationData = _isolation;
    });
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
  
  
  document.getElementById('updateButton').addEventListener('click', async (e) => {
      e.preventDefault();
  
      const form = new FormData();
      form.append('image_data', JSON.stringify(certificateData));
      form.append('verified_place', JSON.stringify(verifyData));
      form.append('isolation', JSON.stringify(isolationData));
      form.append('serial_no', VENTILATOR_ID.serial_no);
      form.append('item', VENTILATOR_ID.item);
      form.append('place', signature.place);
      form.append('date', signature.date);
      form.append('inspector', signature.inspector);
      form.append('signatures', signatureB64);
      const res = await fetch(`/Certificates/editEachVentilator/${VENTILATOR_ID.ventilator_id}`, {
        method: 'POST',
        body: form
      });
  
      const data = await res.json();
  
      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'Congratulations!',
          text: `${data.message}`,
      })
      setTimeout(function() {
        window.location.href = `/ventilator-lists`;
        }, 1000);
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Update Error',
          text: `${data.message}`,
      })
    }
  })
  
  
  
  
  
  
  
    