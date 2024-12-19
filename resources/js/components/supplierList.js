import  React, {useEffect, useState} from 'react';
import ReactHTMLTableToExcel from 'react-html-table-to-excel';
import Paginator from "./common/paginator";

const SupplierTable = (props) => {

    const pageData = props.props;
    const show_url = pageData.base_url+'/supplier/';
    const [tableData, setTableData] = useState([]);
    const [loading, setLoading] = useState(true);

    const [sortFields, setSortFields] = useState('');
    const [sortOrder, setSortOrder] = useState('ASC');
    const [searchText, setSearchText] = useState("");

    const [perPage, setPerPage] = useState(10);
    const [currentPage, setCurrentPage] = useState(1);
    const [pagination, setPagination] = useState({});

    //set column states
    const [supplierNameSorted, setSupplierNameSorted] = useState(false);
    const [supplierAddressSorted, setSupplierAddressSorted] = useState(false);
    const [supplierContactSorted, setSupplierContactSorted] = useState(false);
    const [supplierEmailSorted, setSupplierEmailSorted] = useState(false);

    const buildSortQueryPram = () => {
        let str = [];
        if(supplierNameSorted)
            str.push(['name']);
        if(supplierAddressSorted)
            str.push(['address']);
        if(supplierContactSorted)
            str.push(['contact']);
        if(supplierEmailSorted)
            str.push(['email']);

        str = str.join(",");
        return str;
    }

    const fetchTableData = async () => {
        const  params = {
            sort_field: sortFields,
            sort_order: sortOrder,
            per_page: perPage,
            page: currentPage,
            search_text:searchText,
            api_token: pageData.api_token
        };

        await axios.get(pageData.api_url+'/supplier',{params}).then( data => {
            if(data.data.data){
                setTableData(data.data.data);
                setPagination(data.data.meta);
            }
            setLoading(false)
        });
    };

    useEffect(()=> {
        fetchTableData().then( data => {
            //todo write any post fetch logic here....
        });
    },[sortFields,sortOrder,perPage,currentPage,searchText]);

    useEffect(()=> {
        setSortFields(buildSortQueryPram());
    }, [ supplierNameSorted, supplierAddressSorted, supplierContactSorted, supplierEmailSorted]);



    const sortFieldHandler =async (field,e,setStateHandler) => {

        const isChecked = e.target.checked;

        switch (field) {
            case 'name':
                setStateHandler(isChecked);
                break;
            case 'address':
                setStateHandler(isChecked);
                break;
            case 'contact':
                setStateHandler(isChecked);
                break;
            case 'email':
                setStateHandler(isChecked);
                break;
        }
    }

    const perPageHandler = (event) => {
        setPerPage(event.target.value);
        setCurrentPage(1);
    }

    const searchTextHandler = (event) => {
        setSearchText(event.target.value);
        setCurrentPage(1);
    }

    const columns = [
        { key:'name', 'title': 'Name' ,'sort':true,'onChangeHandler':sortFieldHandler, defaultChecked:supplierNameSorted,setStateHandler:setSupplierNameSorted},
        { key:'address', 'title': 'Address' ,'sort':true,'onChangeHandler':sortFieldHandler, defaultChecked:supplierAddressSorted,setStateHandler:setSupplierAddressSorted},
        { key:'contact', 'title': 'Contact' ,'sort':true,'onChangeHandler':sortFieldHandler, defaultChecked:supplierContactSorted,setStateHandler:setSupplierContactSorted},
        { key:'email', 'title': 'Email' ,'sort':true,'onChangeHandler':sortFieldHandler, defaultChecked:supplierEmailSorted,setStateHandler:setSupplierEmailSorted },
        { key:'web_url', 'title': 'Web Site' },
        { key:'view', 'title': 'View','sort':false, 'url':{ 'href':show_url } }
    ];

    return (

        <div>
            <div className="col-md-2">
                <div className="form-group row">
                    <label className="col-sm-4 col-form-label">Rows</label>
                    <div className="col-sm-8">
                        <select className="form-control" value={perPage} onChange={perPageHandler}>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="1000">100+</option>
                        </select>
                    </div>
                </div>
            </div>

            <div className="col-md-4">
                <div className="form-group row">
                    <label className="col-sm-2 col-form-label">Search</label>
                    <div className="col-sm-8">
                        <input type="text" className="form-control" value={searchText} onChange={searchTextHandler}/>
                    </div>
                </div>
            </div>

            <ReactHTMLTableToExcel
                id="test-table-xls-button"
                className="download-table-xls-button"
                table="table-to-xls"
                filename="Items"
                sheet="items"
                buttonText="Download as XLS"/>

            <table id="table-to-xls" className="table table-responsive table-bordered table-striped">
                <thead>
                <tr>
                    {columns.map((column,index)=>{
                        return (
                            <th key={column.key}>
                                {column.sort?(
                                    <input defaultChecked={column.defaultChecked} type="checkbox" onClick={ (e) => { sortFieldHandler(column.key,e,column.setStateHandler); }}/>
                                ):''}
                                <span> {column.title} {column.sort?(<i className="fa fa-sort"></i>):''}</span>
                            </th>
                        );
                    })}
                </tr>
                </thead>
                <tbody>
                { loading? (
                    <tr>
                        <td colSpan={16} className="text-center">Loading data.....</td>
                    </tr>
                ) : (
                    tableData.map((data, index) => {
                        return (
                            <tr key={index}>
                                {columns.map((column,index)=> {
                                    if (!column.url)
                                    {
                                        return (
                                            <td key={column.key}>{ data[column.key] }</td>
                                        )
                                    }
                                    else {
                                        return (
                                            <td key={column.key}>
                                                <a href={ column.url.href+data.id } ><i className="fa fa-paper-plane"></i></a>
                                            </td>
                                        )
                                    }
                                })}

                            </tr>
                        )
                    })
                ) }
                </tbody>
            </table>
            { !loading && tableData.length>0? (<Paginator pagination={pagination} pageChanged={ (page)=> setCurrentPage(page) }/>):null }
        </div>
    );
};

export default SupplierTable;
