import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import Paginator from "./common/paginator";
import BrandModal from "./common/modals/brand-modal";

const ItemCodeTable = (props) => {


    const pageData = props.props;
    const [tableData, setTableData] = useState([{id:1}]);
    const [loading, setLoading] = useState(true);

    const [sortField, setSortField] = useState('item_id');
    const [sortOrder, setSortOrder] = useState('ASC');
    const [perPage, setPerPage] = useState(10);
    const [currentPage, setCurrentPage] = useState(1);
    const [searchText, setSearchText] = useState("");

    const [pagination, setPagination] = useState({});

    const [itemCol, setItemCol] = useState('checked');

    const [modalShow, setModalShow] = React.useState(false);

    useEffect(()=> {
        const fetchTableData = async () => {
            const  params = {
                sort_field: sortField,
                sort_order: sortOrder,
                per_page: perPage,
                page: currentPage,
                search_text:searchText,
                api_token: pageData.api_token
            };
            await axios.get(pageData.api_url+'/item-code',{params}).then( data => {

                if(data.data.data){
                    setTableData(data.data.data);
                    setPagination(data.data.meta);
                }

                setLoading(false)
            });
        };

        fetchTableData().then( data => {
            //todo write any post fetch logic here....
        });

    },[sortField,sortOrder,perPage,currentPage,searchText]);

    const sortFieldHandler = (field) => {
        switch (field){
            case 'name':
                setSortField('item_name');
                setItemCol(!itemCol);
                break;
            case 'unit_cost':
                setSortField('unit_cost');
                break;
            default:
                setSortField('item_id');
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

            <table className="table table-responsive table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            <input defaultChecked={itemCol} type="checkbox" onChange={ (e) => sortFieldHandler("name")}/>
                            <span> Item <i className="fa fa-sort"></i></span>
                        </th>
                        <th>Brand</th>
                        <th>Category</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th onClick={ (e) => sortFieldHandler("unit_cost")} >Unit Cost (LKR) <span> <i className="fa fa-sort"></i> </span></th>
                        <th>Selling Price (LKR)</th>
                        <th>Market Price (LKR)</th>
                        <th>Min Price (LKR)</th>
                        <th>Max Price (LKR)</th>
                        <th>NBT %</th>
                        <th>VAT %</th>
                        <th>Unit Price With Taxes (LKR)</th>
                        <th>In Stock</th>
                        <th><i className="fa fa-plane"></i></th>
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
                                    <td>{data.name}</td>
                                    <td onClick={() => setModalShow(true)} >{data.brand_name }</td>
                                    <td>{data.category_name}</td>
                                    <td>{data.color_name}</td>
                                    <td>{data.size_name}</td>
                                    <td>{data.unit_cost}</td>
                                    <td>{data.selling_price}</td>
                                    <td>{data.market_price}</td>
                                    <td>{data.min_price}</td>
                                    <td>{data.max_price}</td>
                                    <td>{data.nbt_tax_percentage}</td>
                                    <td>{data.vat_tax_percentage}</td>
                                    <td>{data.unit_price_with_tax}</td>
                                    <td>{data.stock_qty}</td>
                                    <td>
                                        <a href={ pageData.base_url+'/ims/item/'+data.id } ><i className="fa fa-paper-plane"></i></a>
                                    </td>
                                </tr>
                            )
                        })
                    ) }
                </tbody>
            </table>

            { !loading && tableData.length>0? (<Paginator pagination={pagination} pageChanged={ (page)=> setCurrentPage(page) }/>):null }

            <BrandModal props={modalShow} />

        </div>
    );
};

export default ItemCodeTable;

if (document.getElementById('itemCodeList')) {
    ReactDOM.render(
            <ItemCodeTable props={ window.pageDate }/>,
        document.getElementById('itemCodeList'));
}
