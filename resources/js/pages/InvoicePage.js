import React from 'react';
import ReactDOM from 'react-dom';
import Invoice from './components/invoice/invoice'


function InvoicePage() {
    return (
        <Invoice />
    );
}

export default InvoicePage;

if (document.getElementById('invoice')) {
    ReactDOM.render(<InvoicePage />, document.getElementById('invoice'));
}
