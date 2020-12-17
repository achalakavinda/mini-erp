import React from 'react';
import ReactDOM from 'react-dom';

function Invoice() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Invoice Component</div>

                        <div className="card-body">I'm an Invoice component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Invoice;

if (document.getElementById('invoice')) {
    ReactDOM.render(<Invoice />, document.getElementById('invoice'));
}
