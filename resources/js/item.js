import ReactDOM from "react-dom";
import React from "react";

import ItemCodeTable from "./components/itemCodeList";

if (document.getElementById('itemCodeList')) {
    ReactDOM.render(
        <ItemCodeTable props={ window.pageDate }/>,
        document.getElementById('itemCodeList'));
}
