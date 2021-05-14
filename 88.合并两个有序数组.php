<?php
/*
 * @lc app=leetcode.cn id=88 lang=php
 *
 * [88] 合并两个有序数组
 *
 * https://leetcode-cn.com/problems/merge-sorted-array/description/
 *
 * algorithms
 * Easy (50.84%)
 * Likes:    951
 * Dislikes: 0
 * Total Accepted:    358K
 * Total Submissions: 703.2K
 * Testcase Example:  '[1,2,3,0,0,0]\n3\n[2,5,6]\n3'
 *
 * 给你两个有序整数数组 nums1 和 nums2，请你将 nums2 合并到 nums1 中，使 nums1 成为一个有序数组。
 *
 * 初始化 nums1 和 nums2 的元素数量分别为 m 和 n 。你可以假设 nums1 的空间大小等于 m + n，这样它就有足够的空间保存来自
 * nums2 的元素。
 *
 *
 *
 * 示例 1：
 *
 *
 * 输入：nums1 = [1,2,3,0,0,0], m = 3, nums2 = [2,5,6], n = 3
 * 输出：[1,2,2,3,5,6]
 *
 *
 * 示例 2：
 *
 *
 * 输入：nums1 = [1], m = 1, nums2 = [], n = 0
 * 输出：[1]
 *
 *
 *
 *
 * 提示：
 *
 *
 * nums1.length == m + n
 * nums2.length == n
 * 0
 * 1
 * -10^9
 *
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums1
     * @param int $m
     * @param Iint[] $nums2
     * @param int $n
     * @return NULL
     */
    public function merge(&$nums1, $m, $nums2, $n)
    {
        $a = [];

        $j = 0; // 标记 j 走了几格

        for ($i = 0; $i < $m; $i++) {
            for (; $j < $n; $j++) {
                if ($nums2[$j] <= $nums1[$i]) {
                    $a[] = $nums2[$j];
                } else {
                    break;
                }
            }

            $a[] = $nums1[$i];
        }

        if ($j < $n) {
            for ($i = $j; $i < $n; $i++) {
                $a[] = $nums2[$i];
            }
        }

        $nums1 = $a;

        return $nums1;
    }
}
// @lc code=end
