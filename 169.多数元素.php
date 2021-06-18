<?php
/*
 * @lc app=leetcode.cn id=169 lang=php
 *
 * [169] 多数元素
 *
 * https://leetcode-cn.com/problems/majority-element/description/
 *
 * algorithms
 * Easy (66.13%)
 * Likes:    1025
 * Dislikes: 0
 * Total Accepted:    327.6K
 * Total Submissions: 495.3K
 * Testcase Example:  '[3,2,3]'
 *
 * 给定一个大小为 n 的数组，找到其中的多数元素。多数元素是指在数组中出现次数 大于 ⌊ n/2 ⌋ 的元素。
 *
 * 你可以假设数组是非空的，并且给定的数组总是存在多数元素。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：[3,2,3]
 * 输出：3
 *
 * 示例 2：
 *
 *
 * 输入：[2,2,1,1,1,2,2]
 * 输出：2
 *
 *
 *
 *
 * 进阶：
 *
 *
 * 尝试设计时间复杂度为 O(n)、空间复杂度为 O(1) 的算法解决此问题。
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function majorityElement($nums)
    {
        $total = count($nums);

        while (true) {
            $a = $nums[0];

            $nums = array_values(array_filter($nums, function ($num) use ($a) {
                return $num !== $a;
            }));

            // var_dump($nums);

            if (2 * count($nums) <  $total || count($nums) === 0) {
                return $a;
            }
        }
    }
}
// @lc code=end
