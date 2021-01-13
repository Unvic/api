<?php

namespace app\controller;
use app\BaseController;

class Swagger extends BaseController
{
    /**
     * @OA\Get (
     *   tags = {"创建 API 文档"},
     *   path = "/createAPI",
     *   summary = "创建 API 文档",
     *   @OA\Response (
     *     response = 200,
     *     description = "文档生成成功"
     *   ),
     *   @OA\Response (
     *     response = 400,
     *     description = "文档生成失败"
     *   )
     * )
     *
     * @return int|mixed|string|\think\response\Json
     */
    public function createSwagger()
    {
        # 扫描应用目录
        $swagger = \OpenApi\scan( __DIR__ );
        # 在public目录下生成swagger.json
        try
        {
            $swagger->saveAs('./swagger.json');
        }
        catch ( \Exception $e )
        {
            return show( 400, '文档生成失败' );
        }
        return show( 200, '文档生成成功' );
    }
}
