let bodyData = {
    name: 'Body (mark Pos.)',
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
        name: 'Jacob Flange bend/damaged',
        ok_f: null,
      },
      {
        name: 'Other',
        ok_f: null,
      },
    ]
};
  
  let ignitionSystem = {
    name: 'Ignition System',
    data: [
      {
        name: 'Ignition Cable damaged',
        ok_f: null,
      },
      {
        name: 'Spark igniter dirty/damaged',
        ok_f: null,
      },
      {
        name: 'Spark plug/cap damaged',
        ok_f: null,
      },
      {
        name: 'Other',
        ok_f: null,
      },
    ]
};
  
  let nozzle = {
    name: 'Nozzle',
    data: [
      {
        name: 'Nozzle damaged',
        ok_f: null,
      },
      {
  
        name: 'Nozzle not centered',
        ok_f: null,
      },
      {
        name: 'Nozzle dirty/carbonized',
        ok_f: null,
      },
      {
        name: 'Paint/Colour',
        ok_f: null,
      },
      {
        name: 'Other',
        ok_f: null,
      },
    ]
};

  let electric = {
    name: 'Electric',
    data: [
      {
        name: 'Casing damaged',
        ok_f: null,
      },
      {
        name: 'Casing needs repainting',
        ok_f: null,
      },
      {
        name: 'Amphenol socket damaged',
        ok_f: null,
      },
      {
        name: 'UV Sensor cable/connector',
        ok_f: null,
      },
      {
        name: 'Other',
        ok_f: null,
      },
    ]
};
  
  let mediaConnector = {
    name: 'Media Connector',
    data: [
      {
        name: 'Gas flange damaged',
        ok_f: null,
      },
      {
        name: 'Gas valve damaged',
        ok_f: null,
      },
      {
        name: 'Gas valve/flange needs painting',
        ok_f: null,
      },
      {
        name: 'Oil/compressed Air connector',
        ok_f: null,
      },
      {
        name: 'Other',
        ok_f: null,
      },
    ]
};

  
  let certificateData = [
    bodyData,
    ignitionSystem,
    nozzle,
    electric,
    mediaConnector,

  ];
  
  let verifyData = [
    {
      name: 'Inspected sticker',
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
  ];
  
  let isolationData = [
    {
      test: 'UV Sensor',
      param: 'check if signal is ok',
      ok_f: null,
    },
    {
      test: 'Spark Ignition',
      param: 'check if spark can be heard and seen',
      ok_f: null,
    },
  ];

  let safety = {
    ok_f: null
  };

  let isolationDatas = [
    isolationData,
    safety
  ];

  
  let signature = {
    'inspector' : null,
    'place' : null,
    'date' : null,
  };
  
  
  
  certficate();
  verify();
  isolation();


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

  function isolation () {
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
                    <select class="form-control form-control-md isoSelect" value="OK" data-index="${index}" style="cursor: pointer;" >
                      <option value="" >Select</option>
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
                    <select class="form-control form-control-md isoLastSelect" value="OK" data-label="" style="cursor: pointer;" >
                      <option value="" >Select</option>
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
  
  
  document.getElementById('saveButton').addEventListener('click', async (e) => {
      e.preventDefault();
  
      const form = new FormData();
      form.append('image_data', JSON.stringify(certificateData));
      form.append('verified_place', JSON.stringify(verifyData));
      form.append('isolation', JSON.stringify(isolationDatas));
      form.append('serial_no', SERIAL_NUMBER.serial_number);
      form.append('item', SERIAL_NUMBER.item.item_name);
      form.append('place', signature.place);
      form.append('date', signature.date);
      form.append('inspector', signature.inspector);
      form.append('signatures', signatureB64);
      const res = await fetch(`/Certificates/burnerReport`, {
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



  
  
  
  
  
  
  
    