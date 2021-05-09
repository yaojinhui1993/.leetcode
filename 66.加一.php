<?php
/*
 * @lc app=leetcode.cn id=66 lang=php
 *
 * [66] 加一
 *
 * https://leetcode-cn.com/problems/plus-one/description/
 *
 * algorithms
 * Easy (45.70%)
 * Likes:    687
 * Dislikes: 0
 * Total Accepted:    286.4K
 * Total Submissions: 626.5K
 * Testcase Example:  '[1,2,3]'
 *
 * 给定一个由 整数 组成的 非空 数组所表示的非负整数，在该数的基础上加一。
 *
 * 最高位数字存放在数组的首位， 数组中每个元素只存储单个数字。
 *
 * 你可以假设除了整数 0 之外，这个整数不会以零开头。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：digits = [1,2,3]
 * 输出：[1,2,4]
 * 解释：输入数组表示数字 123。
 *
 *
 * 示例 2：
 *
 *
 * 输入：digits = [4,3,2,1]
 * 输出：[4,3,2,2]
 * 解释：输入数组表示数字 4321。
 *
 *
 * 示例 3：
 *
 *
 * 输入：digits = [0]
 * 输出：[1]
 *
 *
 *
 *
 * 提示：
 *
 *
 * 1
 * 0
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $digits
     * @return int[]
     */
    public function plusOne($digits)
    {
        $length = count($digits);

        $result = [];

        $flag = 1; // 0 不需要加一， 1 需要加一
        for ($i = $length - 1; $i >= 0; $i--) {
            // 不需要加一
            if ($flag === 0) {
                $result[] = $digits[$i];
            }
            // 需要加一
            if ($flag === 1) {
                if ($digits[$i] < 9) {
                    // 直接加一
                    $result[] = $digits[$i] + 1;
                    $flag = 0;
                } elseif ($digits[$i] === 9) {
                    $result[] = 0; // 进位加一

                    $flag = 1;
                }
            }
        }

        // 最后标志为还是一，则说明需要进位
        if ($flag === 1) {
            $result[] = 1;
        }

        return array_reverse($result);

        // $r = [];

        // for ($i = count($result) - 1; $i >= 0; $i--) {
        //     $r[] = $result[$i];
        // }


        // return $r;
    }

    // /**
    //  * 大数的时候无法处理
    //  * @param int[] $digits
    //  * @return int[]
    //  */
    // public function plusOne($digits)
    // {
    //     $length = count($digits);

    //     $num = 0;

    //     // 转为整型
    //     for ($i = 0; $i < $length; $i ++) {
    //         if ($num === 0 && $digits[$i] === 0) {
    //             continue;
    //         }
    //         $num += $digits[$i] *  (10 ** ($length - $i - 1));
    //     }


    //     // 加一
    //     $num = $num + 1;

    //     // 转成 数组
    //     $nums = [];
    //     while ($num !== 0) {
    //         $nums[] = $num % 10;
    //         $num = (int)($num / 10);
    //     }

    //     $result = [];

    //     // 逆序
    //     for ($i = count($nums) - 1; $i >= 0; $i --) {
    //         $result[] = $nums[$i];
    //     }

    //     // 输出
    //     return $result;
}
// @lc code=end
