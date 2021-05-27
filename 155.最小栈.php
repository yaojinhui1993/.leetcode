<?php
/*
 * @lc app=leetcode.cn id=155 lang=php
 *
 * [155] 最小栈
 *
 * https://leetcode-cn.com/problems/min-stack/description/
 *
 * algorithms
 * Easy (56.62%)
 * Likes:    913
 * Dislikes: 0
 * Total Accepted:    241K
 * Total Submissions: 424.4K
 * Testcase Example:  '["MinStack","push","push","push","getMin","pop","top","getMin"]\n[[],[-2],[0],[-3],[],[],[],[]]'
 *
 * 设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。
 *
 *
 * push(x) —— 将元素 x 推入栈中。
 * pop() —— 删除栈顶的元素。
 * top() —— 获取栈顶元素。
 * getMin() —— 检索栈中的最小元素。
 *
 *
 *
 *
 * 示例:
 *
 * 输入：
 * ["MinStack","push","push","push","getMin","pop","top","getMin"]
 * [[],[-2],[0],[-3],[],[],[],[]]
 *
 * 输出：
 * [null,null,null,null,-3,null,0,-2]
 *
 * 解释：
 * MinStack minStack = new MinStack();
 * minStack.push(-2);
 * minStack.push(0);
 * minStack.push(-3);
 * minStack.getMin();   --> 返回 -3.
 * minStack.pop();
 * minStack.top();      --> 返回 0.
 * minStack.getMin();   --> 返回 -2.
 *
 *
 *
 *
 * 提示：
 *
 *
 * pop、top 和 getMin 操作总是在 非空栈 上调用。
 *
 *
 */

// @lc code=start
class MinStack
{
    protected $val;
    protected $count;

    /**
     * initialize your data structure here.
     */
    public function __construct()
    {
        $this->val = [];
        $this->count = -1;
    }
    /*
     ["MinStack","push","push","push","top","pop","getMin","pop","getMin","pop","push","top","getMin","push","top","getMin","pop","getMin"]\n
     [[],[2147483646],[2147483646],[2147483647],[],[],[],[],[],[],[2147483647],[],[],[-2147483648],[],[],[],[]]
    */
    // my
    // [null,null,null,null,2147483647,null,2147483646,null,2147483646,null,null,,2147483647,null,,-2147483648,null,-2147483648]
    // Expected Answer
    // [null,null,null,null,2147483647,null,2147483646,null,2147483646,null,null,2147483647,2147483647,null,-2147483648,-2147483648,null,2147483647]

    /**
     * @param Integer $val
     * @return NULL
     */
    public function push($val)
    {
        $this->val[] = $val;
        $this->count++;
        // var_dump($this->val);
        // return array_push($this->$val, $val);
    }

    /**
     * @return NULL
     */
    public function pop()
    {
        // $this->val = array_slice($this->val, 0, $this->count - 1);

        // var_dump($this->val);

        // var_dump($this->val);
        unset($this->val[$this->count]);

        // $this->val = array_values($this->val);
        // var_dump($this->val);

        $this->count--;
    }

    /**
     * @return Integer
     */
    public function top()
    {
        var_dump($this->val);
        return $this->val[$this->count];
    }

    /**
     * @return Integer
     */
    public function getMin()
    {
        return min($this->val);
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
// @lc code=end
