let frameData = {
  name: 'Frame(mark Pos.)',
  data: [
    {
      name: 'Welding joint broken',
      ok_f: null,
    },
    {
      name: 'Replace wheels',
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
      name: 'Adjusting screw / star handle',
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
      name: 'Writing problems',
      ok_f: null,
    },
    {
      name: 'Writing loose',
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


certficate();
verify();


function certficate() {

  const dataTable = document.getElementById('certificate');
  dataTable.innerHTML = `
    <div class="card mb-0 mt-3" style="box-shadow: none;">
      <table class="table table-default mb-0">
        ${certificateData.map((cert, index) => {
          return (`
            <thead>
              <tr>
                <th scope="col" style="width: 550px;">${cert.name}</th>
                <td scope="col">OK/F</td>
                <td scope="col">Repaired Sign</td>
                <td scope="col">Date</td>
              </tr>
            </thead>
            ${cert.data.map((item, dataIndex) => {
              return (`
                <tr>
                  <td>
                    <ul>
                      ${item.titles.map((title, titleIndex) => {
                        return (`
                            <input class="form-check-input checkTitle" type="checkbox" data-root-index="${index}" data-data-index="${dataIndex}" data-title-index="${titleIndex}">
                            ${title.name}
                        `)
                      }).join('')}
                    </ul>
                  </td>
                  <td>
                    <select ${!item.checked ? 'disabled' : ''} class="form-control form-control-sm okFselect" data-root-index="${index}" data-data-index="${dataIndex}" >
                      <option value="">Select</option>
                      <option value="OK">OK</option>
                      <option value="Fail">Fail</option>
                    </select>
                  </td>
                  <td >
                    <input ${!item.checked ? 'disabled' : ''} class="form-control form-control-sm repairedSignInput" placeholder="Repaired Sign" data-root-index="${index}" data-data-index="${dataIndex}" >
                  </td>
                  <td >
                    <input ${!item.checked ? 'disabled' : ''} type="date" class="form-control form-control-sm dateInput" data-root-index="${index}" data-data-index="${dataIndex}">
                  </td>
                </tr>
              `)
            }).join('')}
          `)
        }).join('')}
      </table>
    </div>`;

  Array.from(document.querySelectorAll('.checkTitle'))
  .forEach(elem => {
    elem.addEventListener('change', (e) => {
      let { rootIndex, dataIndex, titleIndex } = e.target.dataset;
      let { checked } = e.target;

      let _okFselect = document.querySelector(`select.okFselect[data-root-index="${rootIndex}"][data-data-index="${dataIndex}"]`);
      let _repairedSign = document.querySelector(`input.repairedSignInput[data-root-index="${rootIndex}"][data-data-index="${dataIndex}"]`);
      let _dateInput = document.querySelector(`input.dateInput[data-root-index="${rootIndex}"][data-data-index="${dataIndex}"]`);
      let _certificateData = [...certificateData];

      _certificateData[rootIndex]['data'][dataIndex].titles[titleIndex].checked = checked;
      _certificateData[rootIndex]['data'][dataIndex].checked = checked;
        certificateData = _certificateData;

      if (checked) {
        _repairedSign.disabled = false;
        _dateInput.disabled = false;
        _okFselect.disabled = false;
  
      } else {
        _repairedSign.disabled = true;
        _dateInput.disabled = true;
        _okFselect.disabled = true;
      }

    });
  });

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

  Array.from(document.querySelectorAll(`input.repairedSignInput`))
    .forEach(elem => {
      elem.addEventListener('change', (e) => {
        let { rootIndex, dataIndex } = e.target.dataset;
        let { value } = e.target;
        let _certificateData = [...certificateData];

        _certificateData[rootIndex]['data'][dataIndex].repairedSign = value;
        certificateData = _certificateData;


      });
    });
  
  Array.from(document.querySelectorAll(`input.dateInput`))
    .forEach(elem => {
      elem.addEventListener('change', (e) => {
        let { rootIndex, dataIndex } = e.target.dataset;
        let { value } = e.target;
        let _certificateData = [...certificateData];

        _certificateData[rootIndex]['data'][dataIndex].date = value;
        certificateData = _certificateData;
      });
    });

}

function verify() {
  const verify = document.getElementById('verify');
  verify.innerHTML = verifyData.map((ver, index) => {
    return (`
      <div>
        <input class="form-check-input" type="checkbox" data-index="${index}">
        <label>${ver.name}</label>
      </div>
    `)
  }).join('');
}


document.getElementById('UpdateButton').addEventListener('click', async (e) => {
    e.preventDefault();

    const form = new FormData();
    form.append('data', JSON.stringify(certificateData));
    // form.append('ventilator_id', 1);
    // form.append('name', 'test');
    const res = await fetch(`Certificate/ventilatorReport`, {
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
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Update Error',
        text: `${data.message}`,
    })
    }
  })
