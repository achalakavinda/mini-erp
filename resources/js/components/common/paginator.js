import React, {useEffect, useState} from 'react';
const OFFSET = 4;

const Paginator = ({pagination, pageChanged}) => {

    const [pageNumbers, setPageNumbers] = useState([]);

    useEffect(()=> {

        const setPaginationPages = () => {
            let pages = [];

            const {last_page,current_page, from,to } = pagination;

            if(from === to && current_page!= 1) pageChanged(1);

            if(!to) return [];

            let fromPage = current_page - OFFSET;

            if( fromPage < 1 ) fromPage = 1;

            let toPage = fromPage + OFFSET*2;

            if(toPage >= last_page){
                toPage=last_page;
            }

            for (let page = fromPage; page<= toPage; page++)
            {
                pages.push(page);
            }

            setPageNumbers(pages);
        };

        setPaginationPages();


    },[pagination]);

    return (
        <nav aria-label="Page navigation example">
            <ul className="pagination justify-content-center">

                <li className={"page-item" + (pagination.current_page === 1? ' disabled': '')}>
                    <a className="page-link" href="#" onClick={()=> { pagination.current_page === 1?null: pageChanged(pagination.current_page - 1) }}>Previous</a>
                </li>

                {pageNumbers.map((pageNumber,index)=>{
                    return(
                        <li key={index} className={"page-item" + (pageNumber === pagination.current_page? ' active':'')}><a className="page-link" href="#" onClick={()=> { pageChanged(pageNumber) } }>{pageNumber}</a></li>
                    );
                })
                }

                <li className={"page-item" + (pagination.current_page === pagination.last_page? ' disabled': '')}>
                    <a className="page-link" href="#" onClick={()=> { pagination.current_page === pagination.last_page? null: pageChanged(pagination.current_page +1); }}>Next</a>
                </li>
            </ul>
            <p>Showing { pagination.from} - {pagination.to} of {pagination.total} entries.</p>
        </nav>
    );
}

export default Paginator;
