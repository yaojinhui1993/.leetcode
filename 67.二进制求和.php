<?php
/*
 * @lc app=leetcode.cn id=67 lang=php
 *
 * [67] 二进制求和
 *
 * https://leetcode-cn.com/problems/add-binary/description/
 *
 * algorithms
 * Easy (54.41%)
 * Likes:    605
 * Dislikes: 0
 * Total Accepted:    165.5K
 * Total Submissions: 304K
 * Testcase Example:  '"11"\n"1"'
 *
 * 给你两个二进制字符串，返回它们的和（用二进制表示）。
 *
 * 输入为 非空 字符串且只包含数字 1 和 0。
 *
 *
 *
 * 示例 1:
 *
 * 输入: a = "11", b = "1"
 * 输出: "100"
 *
 * 示例 2:
 *
 * 输入: a = "1010", b = "1011"
 * 输出: "10101"
 *
 *
 *
 * 提示：
 *
 *
 * 每个字符串仅由字符 '0' 或 '1' 组成。
 * 1 <= a.length, b.length <= 10^4
 * 字符串如果不是 "0" ，就都不含前导零。
 *
 * test input: "1"\n"1"\n
 *
 "10100000100100110110010000010101111011011001101110111111111101000000101111001110001111100001101"\n"110101001011101110001111100110001010100001101011101010000011011011001011101111001100000011011110011"\n
 *
 */

// @lc code=start
class Solution
{
    /**
    * Only work on small data
    *
    * @param String $a
    * @param String $b
    * @return String
    */
    public function addBinary($a, $b)
    {

        // "1"\n"111"\n

        // a, b 的长度
        $aLength = strlen($a);
        $bLength = strlen($b);

        // 保证 a 一定比 b 来的大
        if ($aLength < $bLength) {
            $temp = $a;
            $a = $b;
            $b = $temp;
            $temp = $aLength;
            $aLength = $bLength;
            $bLength = $temp;
        }

        $differenceLength = $aLength - $bLength;

        $c = [];

        $flag = 0; // 0 不进位， 1 进位

        // 最短的字符串循环相加数据，
        for ($i = $bLength - 1; $i >= 0; $i--) {
            if ($flag === 0) {
                // 需要进位, 值为 0
                if ($a[$i + $differenceLength] === "1" && $b[$i] === "1") {
                    $flag = 1;
                    $c[$i + $differenceLength] = 0;
                }

                // 不需要进位，值为两数之和
                else {
                    $flag = 0;
                    $c[$i + $differenceLength] = (int)$a[$i + $differenceLength] + (int)$b[$i];
                }
            } elseif ($flag === 1) {
                // 下一轮 flag 为 0
                if ($a[$i + $differenceLength] === "0" && $b[$i] === "0") {
                    $flag = 0;
                    $c[$i + $differenceLength] = 1;
                }
                // 不需要
                else {
                    $flag = 1;
                    // 值为 0 或者是 1
                    $c[$i + $differenceLength] = $a[$i + $differenceLength] === "1" && $b[$i] === "1" ? 1 : 0;
                }
            }
        }

        // var_dump($c, $a);

        // 补下后半部分的数值
        for ($i = $differenceLength - 1; $i >= 0; $i--) {
            if ($flag === 1) {
                if ($a[$i] === "1") {
                    $c[$i] = 0;
                    $flag = 1;
                } else {
                    $c[$i]  = 1;
                    $flag = 0;
                }
            } else {
                $c[$i] = $a[$i];
            }
        }
        // "1"\n"111"\n

        // var_dump($c);


        // 补一位
        if ($flag === 1) {
            $c[$aLength] = 1;
        }
        // var_dump($c);

        return join('', array_reverse($c));
    }

    // /**
    //  * Only work on small data
    //  *
    //  * @param String $a
    //  * @param String $b
    //  * @return String
    //  */
    // public function addBinary($a, $b)
    // {
    //     $tenA = base_convert($a, 2, 10);
    //     $tenB = base_convert($b, 2, 10);

    //     $result = $tenA + $tenB;

    //     return decbin($result);
    // }
}
// @lc code=end
