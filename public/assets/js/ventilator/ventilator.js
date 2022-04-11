let frameData = {
  name: 'Frame(mark Pos.)',
  data: [
    {
      name: 'Damaged/Bend',
      ok_f: null,
    },
    {
      name: 'Welding joint broken',
      ok_f: null,
    },
    {
      name: 'Replace wheels FR FL BR BL',
      ok_f: null,
    },
    {
      name: 'Others',
      ok_f: null,
    },
  ]
};

let airValve = {
  name: 'Air Valve',
  data: [
    {
      name: 'Handle damaged',
      ok_f: null,
    },
    {
      name: 'Adjusting screw/star handle',
      ok_f: null,
    },
    {
      name: 'Flap damaged',
      ok_f: null,
    },
    {
      name: 'Others',
      ok_f: null,
    },
  ]
};

let fan = {
  name: 'Fan',
  data: [
    {
      name: 'Fan casing damaged',
      ok_f: null,
    },
    {

      name: 'Turbine Problems',
      ok_f: null,
    },
    {
      name: 'Inlet grid damaged',
      ok_f: null,
    },
    {
      name: 'Paint / Colour',
      ok_f: null,
    },
    {
      name: 'Others',
      ok_f: null,
    },
  ]
};

let motor = {
  name: 'Motor',
  data: [
    {
      name: 'Motor defect',
      ok_f: null,
    },
    {
      name: 'Motor overheating',
      ok_f: null,
    },
    {
      name: 'Ball bearing problem',
      ok_f: null,
    },
    {
      name: 'Grid damaged',
      ok_f: null,
    },
    {
      name: 'Others',
      ok_f: null,
    },
  ]
};

let cableandPlugs = {
  name: 'Cable & Plugs',
  data: [
    {
      name: 'Cable Safety Box / Motor def',
      ok_f: null,
    },
    {
      name: 'Cable Safety Box / Plug def',
      ok_f: null,
    },
    {
      name: 'Glands defect or missing',
      ok_f: null,
    },
    {
      name: 'Plug defect',
      ok_f: null,
    },
    {
      name: 'Others',
      ok_f: null,
    },
  ]
};

let burnerControl = {
  name: 'Burner Control Unit (BCU)',
  data: [
    {
      name: 'Box damaged / dent',
      ok_f: null,
    },
    {
      name: 'Main switch broken',
      ok_f: null,
    },
    {
      name: 'Amphenol',
      ok_f: null,
    },
    {
      name: 'Ampermeter damaged',
      ok_f: null,
    },
    {
      name: 'Push button def',
      ok_f: null,
    },
    {
      name: 'LFE10 problems',
      ok_f: null,
    },
    {
      name: 'Overcurrent relay check',
      ok_f: null,
    },
    {
      name: 'Wiring problems',
      ok_f: null,
    },
    {
      name: 'Wiring loose',
      ok_f: null,
    },
    {
      name: 'Others',
      ok_f: null,
    },
  ]
};

let certificateData = [
  frameData,
  airValve,
  fan,
  motor,
  cableandPlugs,
  burnerControl

];

let verifyData = [
  {
    name: 'Maintenance Card (green/red)',
    checked: false 
  }, 
  {
    name: 'Inspection Card Current Date/Sign',
    checked: false 
  }, 
  {
    name: 'Type Plate S/N',
    checked: false 
  }, 
  {
    name: 'Type Plate Data',
    checked: false 
  }, 
  {
    name: 'Wiring Diagram',
    checked: false 
  }, 
  {
    name: 'Attention Electricity',
    checked: false 
  }, 
  {
    name: 'HW Sticker',
    checked: false 
  }, 
];

let isolation = {
  'l1': null,
  'l2': null,
  'l3': null,
  'remarks': null,
  'safety': null,
  
}

let signature = {
  'inspector' : null,
  'place' : null,
  'date' : null,
};



certficate();
verify();

function certficate() {

  const dataTable = document.getElementById('certificate');
  dataTable.innerHTML = `
    <div class="row mt-3">
      <div class="col-md-6">
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingItem" placeholder="Item" value="${SERIAL_NUMBER.item.item_name}" disabled>
          <label for="floatingItem">Item</label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-floating">
          <input type="txt" class="form-control" id="floatingSerial" placeholder="Serial No." value="${SERIAL_NUMBER.serial_number}" disabled>
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


    let _isolation = {...isolation};
      _isolation[label] = value;

    isolation = _isolation;
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


document.getElementById('saveButton').addEventListener('click', async (e) => {
    e.preventDefault();

    const form = new FormData();
    form.append('image_data', JSON.stringify(certificateData));
    form.append('verified_place', JSON.stringify(verifyData));
    form.append('isolation', JSON.stringify(isolation));
    form.append('serial_no', SERIAL_NUMBER.serial_number);
    form.append('item', SERIAL_NUMBER.item.item_name);
    form.append('place', signature.place);
    form.append('date', signature.date);
    form.append('inspector', signature.inspector);
    form.append('signatures', signatureB64);
    const res = await fetch(`/Certificates/ventilatorReport`, {
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







  