import React, {useCallback, useEffect, useState} from 'react';

const tableComponent = (columns,rows,loading,pageDataurl) => {
    return (
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
                <th> view</th>
            </tr>
            </thead>
            <tbody>
            { loading? (
                <tr>
                    <td colSpan={16} className="text-center">Loading data.....</td>
                </tr>
            ) : (
                rows.map((data, index) => {
                    return (
                        <tr key={index}>
                            {columns.map((column,index)=>{
                                return (
                                    <td key={column.key}>{data[column.key]}</td>
                                ) })}
                            <td>
                                <a href={ pageData.base_url+'/ims/item/'+data.id } ><i className="fa fa-paper-plane"></i></a>
                            </td>
                        </tr>
                    )
                })
            ) }
            </tbody>
        </table>
    );
}

export default tableComponent;
