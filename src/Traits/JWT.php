<?php
/**
 * ClassDescription
 * @Date 2019/4/18 10:13
 */

namespace App\Traits;

use Firebase\JWT\BeforeValidException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\SignatureInvalidException;

trait JWT
{
    /**
     * @var string  加密需要的key
     */
    protected static $key = 'backend';

    /**
     * 生成签名
     *
     * @param array $data
     * @return bool|string
     */
    public function jwtEncode(array $data = [])
    {
        if (empty($data)) {
            return false;
        }

        $time = time();
        // 过期时间
        $expiredTime = 3600;
        $token = [
            'iat'  => $time, // 签发时间
            'exp'  => $time + $expiredTime, // 过期时间
            'data' => $data
        ];

        return \Firebase\JWT\JWT::encode($token, self::$key);
    }

    /**
     * 解码签名
     * @param string $jwt
     * @return array
     */
    public function jwtDecode(string $jwt = '')
    {
        try {
            \Firebase\JWT\JWT::$leeway = 60;
            $decode = \Firebase\JWT\JWT::decode($jwt, self::$key, ['HS256']);
            return ['status' => 1, 'msg' => '解码签名成功', 'data' => (array)$decode];
        }
        catch (\InvalidArgumentException $e) {
            return ['status' => 0, 'msg' => '签名不能为空'];
        }
        catch (SignatureInvalidException $e) {
            return ['status' => 0, 'msg' => '签名错误'];
        }
        catch (ExpiredException $e) {
            return ['status' => 0, 'msg' => '签名已过期'];
        }
        catch (BeforeValidException $e) {
            return ['status' => 0, 'msg' => '其它错误'];
        }
        catch (\UnexpectedValueException $e) {
            return ['status' => 0, 'msg' => '签名无效'];
        }
        catch (\Exception $e) {
            return ['status' => 0, 'msg' => $e->getMessage()];
        }
    }
}
