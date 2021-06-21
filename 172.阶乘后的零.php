<?php
/*
 * @lc app=leetcode.cn id=172 lang=php
 *
 * [172] 阶乘后的零
 *
 * https://leetcode-cn.com/problems/factorial-trailing-zeroes/description/
 *
 * algorithms
 * Easy (43.16%)
 * Likes:    475
 * Dislikes: 0
 * Total Accepted:    78.4K
 * Total Submissions: 181.7K
 * Testcase Example:  '3'
 *
 * 给定一个整数 n，返回 n! 结果尾数中零的数量。
 *
 * 示例 1:
 *
 * 输入: 3
 * 输出: 0
 * 解释: 3! = 6, 尾数中没有零。
 *
 * 示例 2:
 *
 * 输入: 5
 * 输出: 1
 * 解释: 5! = 120, 尾数中有 1 个零.
 *
 * 说明: 你算法的时间复杂度应为 O(log n) 。
 *
 */

// @lc code=start
class Solution
{

    /**
     * @param int $n
     * @return int
     */
    public function trailingZeroes($n)
    {
        if ($n < 5) {
            return 0;
        }
        //
        // $trailingZeroes = (int)floatval($n / 10) * 2;

        // $modeN = $n % 10;

        // if ($modeN >= 5) {
        //     $trailingZeroes += 1;
        // }

        // 是 5 的倍数据

        $trailingZeroes = 0;

        // var_dump($n);

        for ($i = 1; $i*5 <= $n; $i++) {
            $trailingZeroes ++;

            // var_dump($trailingZeroes);
        }


        // 当前的数据，加上统一除以 5 以后的数据
        return $trailingZeroes + $this->trailingZeroes(
            (int)(
                floatval($n / 5)
            )
        );
    }
}
// @lc code=end
