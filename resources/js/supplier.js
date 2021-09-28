import ReactDOM from "react-dom";
import React from "react";

import SupplierTable from "./components/supplierList";

if (document.getElementById('supplierTable')) {
    ReactDOM.render(
        <SupplierTable props={ window.pageDate }/>,
        document.getElementById('supplierTable'));
}
