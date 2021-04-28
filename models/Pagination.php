<?php
class Pagination
{
    public static function createPageLink($totalRow, $perPage, $page)
    {
        

        $numberPage = ceil($totalRow / $perPage);
        $next = $page;
        $disableNext = '';
        $prev = $page;
        $disablePrev = '';
        $begin = ($page <= 2) ? 1 : ($page - 2);
        $end = ($page >= ($numberPage - 2)) ? $numberPage : ($page + 2);

        $link = '';

        foreach ($_GET as $key => $value) {
            if ($key == 'page') {
                continue;
            }
            $link .= '&' . $key . '=' . $value;
        }

        if ($page < $numberPage) {
            $next++;
        } else {
            $disableNext = 'hidden';
        }

        if ($page > 1) {
            $prev--;
        } else {
            $disablePrev = 'hidden';
        }

        $output = '
        <nav class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item page-per-page"><span> Trang ' . $page . ' of ' . $numberPage . '</span></li>  
            <li class="page-item" ' . $disablePrev . '><a class="page-link" href="?'  . 'page=' . 1 . $link . '"><span >Trang Đầu</span></a></li>
            <li class="page-item" ' . $disablePrev . '><a class="page-link" href="?'  . 'page=' . $prev . $link . '"><span >Trang Trước</span></a></li>';

        if ($page - 2 > 1) {
            $output .= '<li class="page-item page-per-page"' . $disablePrev . '><span >...</span></li>';
        }

        for ($i = $begin; $i <= $end; $i++) {
            $active = ($i == $page)?'active"><span >' . $i . ' </span>':'"><a class="page-link" href="?'  . 'page=' . $i . $link . '"><span >' . $i . ' </span></a>';
            $output .= '<li class="page-item '.$active.'</li>';
        }

        if ($page + 2 < $numberPage) {
            $output .= '<li class="page-item page-per-page" ' . $disableNext . '><span >...</span></li>';
        }

        $output .= '
            <li class="page-item" ' . $disableNext . '><a class="page-link" href="?'  . 'page=' . $next . $link . '"><span >Trang Sau</span></a></li>
            <li class="page-item" ' . $disableNext . '><a class="page-link" href="?'  . 'page=' . $numberPage . $link . '"><span >Trang Cuối</span></a></li>
        </ul>
        </nav>'
        ;
        return $output;
    }
}
