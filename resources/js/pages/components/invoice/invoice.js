import React, { Component } from 'react'
class Invoice extends Component {

    constructor() {
        super();
        this.state = {
            taxRate: 0.00,
            lineItems: [
                {
                    id: 'initial',      // react-beautiful-dnd unique key
                    name: '',
                    description: '',
                    quantity: 0,
                    price: 0.00,
                },
            ]
        };
        this.locale = 'en-US';
        this.currency = 'USD';
    }

    render(){
        return (
            <h1>Hi</h1>
        )
    }

}

export default Invoice
