<?php
/*
 * @lc app=leetcode.cn id=118 lang=php
 *
 * [118] 杨辉三角
 *
 * https://leetcode-cn.com/problems/pascals-triangle/description/
 *
 * algorithms
 * Easy (70.74%)
 * Likes:    493
 * Dislikes: 0
 * Total Accepted:    171.4K
 * Total Submissions: 241.4K
 * Testcase Example:  '5'
 *
 * 给定一个非负整数 numRows，生成杨辉三角的前 numRows 行。
 *
 *
 *
 * 在杨辉三角中，每个数是它左上方和右上方的数的和。
 *
 * 示例:
 *
 * 输入: 5
 * 输出:
 * [
 * ⁠    [1],
 * ⁠   [1,1],
 * ⁠  [1,2,1],
 * ⁠ [1,3,3,1],
 * ⁠[1,4,6,4,1]
 * ]
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int $numRows
     * @return int[][]
     */
    public function generate($numRows)
    {
        $a = [] ;

        for ($i = 0; $i <= $numRows; $i++) {
            for ($j = 0; $j < $i; $j ++) {
                if (isset($a[$i - 1][$j - 1]) && $a[$i - 1][$j]) {
                    $a[$i][$j] = $a[$i - 1][$j - 1] + $a[$i - 1][$j];
                } else {
                    $a[$i][$j] = 1;
                }
            }
        }

        return $a;
    }
}
// @lc code=end
