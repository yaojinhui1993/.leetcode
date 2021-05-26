<?php
/*
 * @lc app=leetcode.cn id=136 lang=php
 *
 * [136] 只出现一次的数字
 *
 * https://leetcode-cn.com/problems/single-number/description/
 *
 * algorithms
 * Easy (71.28%)
 * Likes:    1870
 * Dislikes: 0
 * Total Accepted:    406.2K
 * Total Submissions: 568.3K
 * Testcase Example:  '[2,2,1]'
 *
 * 给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 *
 * 说明：
 *
 * 你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？
 *
 * 示例 1:
 *
 * 输入: [2,2,1]
 * 输出: 1
 *
 *
 * 示例 2:
 *
 * 输入: [4,1,2,1,2]
 * 输出: 4
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @return int
     */
    public function singleNumber($nums)
    {
        //
        $total = count($nums);
        for ($i = 0; $i < $total; $i++) {
            for ($j = $i + 1; $j < $total; $j++) {
                // if ($j === count($nums)) {
                //     // var_dump($j, count($nums), $nums, 'abc', $i);
                //     return $nums[$i];
                // }

                if ($nums[$i] === $nums[$j]) {
                    unset($nums[$i]);
                    unset($nums[$j]);
                    // $i = 0;
                    // $j = $i + 1;
                    // $nums = array_values($nums);
                    // var_dump($nums);
                    break;
                }
            }

            // return $nums[$i];
        }
        // [-336,513,-560,-481,-174,101,-997,40,-527,-784,-283,-336,513,-560,-481,-174,101,-997,40,-527,-784,-283,354]


        var_dump($nums);
        return array_values($nums)[0];
    }
}
// @lc code=end
