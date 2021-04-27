<?php

/*
 * @lc app=leetcode.cn id=1 lang=php
 *
 * [1] 两数之和
 */

// @lc code=start
class Solution
{

    /**
     * @param int[] $nums
     * @param int $target
     * @return int[]
     */
    public function twoSum($nums, $target)
    {
        $total = count($nums);

        for ($i = 0 ; $i < $total; $i ++) {
            for ($j = $i + 1; $j < $total; $j ++) {
                if (($nums[$i] + $nums[$j]) === $target) {
                    return [$i, $j];
                }
            }
        }
    }
}
// @lc code=end
