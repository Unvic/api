<?php
// 应用公共文件
/**
 * @means 通用化API数据格式
 * @param int $status
 * @param string $msg
 * @param array $datas
 * @param int $httpStatus
 * @return mixed|string|\think\response\Json
 */
function show( $status = 0, $msg = "", $datas = [], $httpStatus = 200 )
{
    //如果消息提示为空，并且业务状态码定义了，那么就显示默认定义的消息提示
    if ( empty( $msg ) && ! empty( config( "status." . $status ) ) )
    {
        $msg = config( "status." . $status );
    }

    $result = [
        'status' => $status,
        'msg'    => $msg,
        'datas'  => $datas
    ];

    if ( request()->isAjax() )
    {
        return json( $result, $httpStatus );
    }

    return $msg;
}
