<?php
/*
 * @lc app=leetcode.cn id=119 lang=php
 *
 * [119] 杨辉三角 II
 *
 * https://leetcode-cn.com/problems/pascals-triangle-ii/description/
 *
 * algorithms
 * Easy (65.23%)
 * Likes:    284
 * Dislikes: 0
 * Total Accepted:    115.8K
 * Total Submissions: 177.3K
 * Testcase Example:  '3'
 *
 * 给定一个非负索引 k，其中 k ≤ 33，返回杨辉三角的第 k 行。
 *
 *
 *
 * 在杨辉三角中，每个数是它左上方和右上方的数的和。
 *
 * 示例:
 *
 * 输入: 3
 * 输出: [1,3,3,1]
 *
 *
 * 进阶：
 *
 * 你可以优化你的算法到 O(k) 空间复杂度吗？
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int $rowIndex
     * @return int[]
     */
    public function getRow($rowIndex)
    {
        $a = [] ;

        for ($i = 0; $i <= $rowIndex + 1; $i++) {
            for ($j = 0; $j < $i; $j ++) {
                if (isset($a[$i - 1][$j - 1]) && $a[$i - 1][$j]) {
                    $a[$i][$j] = $a[$i - 1][$j - 1] + $a[$i - 1][$j];
                } else {
                    $a[$i][$j] = 1;
                }
            }
            unset($a[$i - 2]);
        }

        return $a[$rowIndex + 1];
    }
}
// @lc code=end
