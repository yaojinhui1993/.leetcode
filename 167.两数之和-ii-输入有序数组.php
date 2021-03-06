<?php
/*
 * @lc app=leetcode.cn id=167 lang=php
 *
 * [167] 两数之和 II - 输入有序数组
 *
 * https://leetcode-cn.com/problems/two-sum-ii-input-array-is-sorted/description/
 *
 * algorithms
 * Easy (57.82%)
 * Likes:    520
 * Dislikes: 0
 * Total Accepted:    222.4K
 * Total Submissions: 383.5K
 * Testcase Example:  '[2,7,11,15]\n9'
 *
 * 给定一个已按照 升序排列  的整数数组 numbers ，请你从数组中找出两个数满足相加之和等于目标数 target 。
 *
 * 函数应该以长度为 2 的整数数组的形式返回这两个数的下标值。numbers 的下标 从 1 开始计数 ，所以答案数组应当满足 1  。
 *
 * 你可以假设每个输入只对应唯一的答案，而且你不可以重复使用相同的元素。
 *
 *
 * 示例 1：
 *
 *
 * 输入：numbers = [2,7,11,15], target = 9
 * 输出：[1,2]
 * 解释：2 与 7 之和等于目标数 9 。因此 index1 = 1, index2 = 2 。
 *
 *
 * 示例 2：
 *
 *
 * 输入：numbers = [2,3,4], target = 6
 * 输出：[1,3]
 *
 *
 * 示例 3：
 *
 *
 * 输入：numbers = [-1,0], target = -1
 * 输出：[1,2]
 *
 *
 *
 *
 * 提示：
 *
 *
 * 2
 * -1000
 * numbers 按 递增顺序 排列
 * -1000
 * 仅存在一个有效答案
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $numbers
     * @param int $target
     * @return int[]
     */
    public function twoSum($numbers, $target)
    {
        $count = count($numbers);

        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if (($numbers[$i] + $numbers[$j]) === $target) {
                    return [$i + 1, $j + 1];
                }
                if ($numbers[$i] === $numbers[$j]) {
                    $i = $j;
                }
            }
        }

        // 过滤重复的数据
        // $lastItem = $numbers[0];
        // for ($i = 1; $i < $count; $i++) {
        //     if ($numbers[$i] === $lastItem) {
        //         unset($numbers[$i]);
        //         continue;
        //     }

        //     $lastItem = $numbers[$i];
        // }

        // foreach ($numbers as $key1 => $value1) {
        //     foreach ($numbers as $key2 => $value2) {
        //         if ($key1 === $key2) {
        //             continue;
        //         }

        //         if (($value1 + $value2) === $target) {
        //             return [$key1 + 1, $key2 + 1];
        //         }
        //     }
        // }

        // for ($i = 0; $i < $count; $i++) {
        //     for ($j = $i + 1; $j < $count; $j++) {
        //         if (($numbers[$i] + $numbers[$j]) === $target) {
        //             return [$i + 1, $j + 1];
        //         }
        //     }
        // }
    }
}
// @lc code=end
