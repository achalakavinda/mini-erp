import React, {useEffect, useState} from 'react';
import ReactDOM from 'react-dom';
import Paginator from "./common/paginator";

const ItemCodeTable = (props) => {


    const pageData = props.props;
    const [tableData, setTableData] = useState([{id:1}]);
    const [loading, setLoading] = useState(true);

    const [sortField, setSortField] = useState('id');
    const [sortOrder, setSortOrder] = useState('ASC');
    const [perPage, setPerPage] = useState(10);
    const [currentPage, setCurrentPage] = useState(1);

    const [pagination, setPagination] = useState({});

    useEffect(()=> {
        const fetchTableData = async () => {
            const  params = {
                sort_field: sortField,
                sort_order: sortOrder,
                per_page: perPage,
                page: currentPage
            };
            await axios.get(pageData.api_url+'/item-code',{params}).then( data =>{
                setTableData(data.data.data);
                setPagination(data.data.meta);
                setLoading(false);
            });
        };

        fetchTableData().then( data => {
            //todo write any post fetch logic here....
        });

    },[sortField,sortOrder,perPage,currentPage]);

    const sortFieldHandler = (field) =>{
        switch (field){
            case 'name':
                setSortField('name');
                break;
            case 'unit_cost':
                setSortField('unit_cost');
                break;
            default:
                setSortField('id');
                break;
        }
    }

    return (
        <div>
            <table className="table table-responsive table-bordered table-striped">

                <thead>
                <tr>
                    <th onClick={ (e) => sortFieldHandler("name")}>Item <span> <i className="fa fa-sort"></i> </span></th>
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
                                <td>{data.brand?data.brand.name:'undefine brand id:'+data.brand_id }</td>
                                <td>{data.category}</td>
                                <td>{data.color}</td>
                                <td>{data.size}</td>
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

            { !loading ? (<Paginator pagination={pagination} pageChanged={ (page)=> setCurrentPage(page) }/>):null }

        </div>
    );
};

export default ItemCodeTable;

if (document.getElementById('itemCodeList')) {
    ReactDOM.render(
            <ItemCodeTable props={ window.pageDate }/>,
        document.getElementById('itemCodeList'));
}
