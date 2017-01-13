function legend(parent, data) {
    parent.className = 'legend col-md-6';
    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

    // remove possible children of the parent
    while(parent.hasChildNodes()) {
        parent.removeChild(parent.lastChild);
    }

    datas.forEach(function(d) {
        var field = document.createElement('span');
        field.className = 'field';
        field.style.borderColor = d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
        field.style.borderStyle = 'solid';
        parent.appendChild(field);

        var text = document.createTextNode(d.label + ": ");
        field.appendChild(text);

        var value = document.createElement('span');
        value.className = "legend-value";
        value.innerHTML = d.value;
        field.appendChild(value);
    });
}
